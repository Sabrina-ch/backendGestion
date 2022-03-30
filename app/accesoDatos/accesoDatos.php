<?php
class AccesoDatos{
    private static $objAccesoDatos;
    private $objetoPDO;



    public static function obtenerInstancia(){
        //si no está seteado lo construyo
        if(!isset(self::$objAccesoDatos)){
            self::$objAccesoDatos = new AccesoDatos();

        }
        //si está seteado lo retorno
        return self::$objAccesoDatos;
    }


    private function __construct() {
       
           
         //base Clever FUNCIONA
         $link='mysql:host=blmftdy1vrovnjq6leyl-mysql.services.clever-cloud.com:3306;dbname=blmftdy1vrovnjq6leyl';
         $usuario='u4n5t5yzfxyrdvax';
         $pass='DVXYHm8JHfdIgHkfisWr';



        try {

        $this->objetoPDO = new PDO($link,$usuario,$pass);
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
            die();
        }
    }

    public function consultaRealizar($consulta){

        return  $this->objetoPDO->prepare($consulta);
    }
}