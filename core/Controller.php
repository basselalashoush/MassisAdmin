<?php 
class Controller {

    public $request;
    private $vars = array();
    public $layout = 'template';
    private $rendered = false;

    function __construct($request = null)
    {
        if($request){
            $this->request = $request;// on stock la request dans l'instance 
        }
    }

    public function render($view){
        if($this->rendered){return false;}
        extract($this->vars);
        if(strpos($view,'/')===0){
            $view = ROOT.DS.'view'.$view;
        }else{
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require $view;
        $template = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = true;
    }

    public function set($key,$value=null){
        if (is_array($key)){
            $this->vars += $key;
        }else{
            $this->vars[$key] = $value;
        }
        
    }

    /**
     * permet de charger un model 
     *
     * @param [type] $name
     * @return 
     */
    public function loadModel($name){
        $file = ROOT.DS.'model'.DS.$name.'.php';
        require_once $file;
        if(!isset($this->$name)){
            $this->$name = new $name();
        }        
    }

    public function e404($message){
        header("http/1.0 404 Not Found");
        $this->set('message',$message);
        $this->render('/errors/404.php');
        die();
    }
}


?>