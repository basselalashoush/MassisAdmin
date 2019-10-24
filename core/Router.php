<?php 
class Router{ 
    static $routes = [];
    static $prefixes = [];

    /**
	* Ajoute un prefix au Routing
	**/
    static function prefix($url,$prefix){
        self::$prefixes[$url] = $prefix;
    }
   /**
    * permet de parser une url
    *@param $url url à parser
    *@return tableau contenant les paramètres
    */ 
    static function parse($url,$request){
        $url = trim($url,'/');
        $params = explode('/',$url);
        if(in_array($params[0],array_keys(self::$prefixes))){
            $request->prefix = self::$prefixes[$params[0]];
            array_shift($params);
        }
        $request->controller = $params[0];
        $request->action =isset($params[1]) ? $params[1] : 'index';
        $request->params = array_slice($params,2);
        return true;
    }

    static function connect($redir,$url){
        $r = [];
        $r['origin'] = '/'.str_replace('/','\/',$url).'/';
        
        self::$routes[] = $r;
        debug($r);
    }

    static function url($url){
        foreach(self::$routes as $v){
            debug($v);
            if(preg_match($v['origin'],$url,$match)){
                debug($match);
            }
        }
        return $url;
    }
}
?>