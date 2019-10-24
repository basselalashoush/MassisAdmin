<?php


class Conf {

    static $debug = 1;
    static $database=['massis' =>[
                     'host' => 'localhost',
                     'dbname' => 'massis1',
                     'user' => 'root',
                     'password' => '']];


}

Router::connect('joueur/:id','joueur/view/id:([0-9]+)');
Router::prefix('cockpit','admin');