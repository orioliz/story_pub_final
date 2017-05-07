<?php

/*
* CONFIGURACION BASICA DE LA BBDD
 */
namespace Api\Lib;
/**
 * Description of db
 *
 * @author linux
 */
class DB {
    public static function start()
    {
        $pdo=new PDO('mysql:host=localhost;dbname=story_pub','root','');
        return $pdo;
    }
}
