<?php
class Cliente{

    private $direccion;
    private $localidad;
    private $cantidadMaquinas;
    private $nombreContacto;
    private $telefonoContacto;

    public static function ingresarCliente(){

    }

    public static function buscarCliente(){

    }

    public static function traerListaClientes(){

          $objetoDatos = AccesoDatos::obtenerInstancia();
          $consulta= $objetoDatos->consultaRealizar("SELECT *FROM clientes");
          $consulta->execute();
        

         return $consulta->fetchAll(PDO::FETCH_OBJ);
     
    }

    public static function editarCliente(){

    }

    public static function agregarImagen(){

    }
    public static function eliminarImagen(){

    }

    public static function eliminarCliente(){}

}