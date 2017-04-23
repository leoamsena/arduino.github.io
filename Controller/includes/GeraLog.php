<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 22/04/2017
 * Time: 00:56
 */
class GeraLog
{
    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance(){
        if (!isset(self::$instance))
            self::$instance = new GeraLog();

        return self::$instance;
    }

    public function inserirLog($msg, $level = 'info'){
        switch ( $level )
        {
            case 'info':
                file_put_contents( "Geral.log", sprintf( "[".date("d-m-Y, H:i:s")."] INFO: %s%s", $msg, PHP_EOL ), FILE_APPEND );
                break;
            case 'warning':
                file_put_contents( "Geral.log", sprintf( "[".date("d-m-Y, H:i:s")."] WARNING: %s%s", $msg, PHP_EOL ), FILE_APPEND );
                break;
            case 'error':
                file_put_contents( "Geral.log", sprintf( "[".date("d-m-Y, H:i:s")."] ERROR: %s%s", $msg, PHP_EOL ), FILE_APPEND );
                break;
        }
   }

}