<?php
// el controlador va manejar cada una de las llamadas
 class clienteController{

    public function retornarLista( $request, $response, $args){
      
        $datos = $request->getParsedBody();
        $usuarios =Cliente::traerListaClientes();
        $resultado = $usuarios;
        
        $response->getBody()->Write(json_encode($usuarios));
            return $response;
    
    }

    public function retornarCliente($request, $response, $args){


    }
 }