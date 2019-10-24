<?php 
class Request{

    public $prefix = false;
    public $url;// url appelé par l'utilisateur
    function __construct(){
        $this->url = $_SERVER['PATH_INFO'];
        //  $req = str_replace(BASE_URL."/", "", $_SERVER['REQUEST_URI']);
        //  $this->url = $req;
    }

}

?>
