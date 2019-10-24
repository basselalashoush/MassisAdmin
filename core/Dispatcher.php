<?php
class Dispatcher{

    var $request;

    /**
	 * function principal du dispatcher
	 * charge le controller en fonction du routing
	 */
    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
        $action = $this->request->action;
        if($this->request->prefix){
            $action = $this->request->prefix.'_'.$action;
        }
        if(!in_array($action,array_diff(get_class_methods($controller),get_class_methods(get_parent_class($controller))))){
            $this->errors('Le controller '.$this->request->controller.' n\'a pas de méthode '.$action);
        }
        call_user_func_array(array($controller,$action),$this->request->params);
        $controller->render($action);
    }

    /**
	 * permet de générer une page d'erreur en cas de problem au niveau du routing (page inexistante)
	 */
    function errors($message){
        $controller = new controller($this->request);
        $controller->e404($message);
    }

    /**
	  * permet de charger le controller en fonction de la requête utilisateur
	  */
    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controller'.DS. $name .'.php';
        require $file;
        $controller = new $name($this->request);
        $controller->Session = new Session();
        return $controller;
    }

}



?>