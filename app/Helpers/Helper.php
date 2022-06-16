<?php

if(! function_exists('getCompleteName')){

    function getCompleteName(){
        $fullname = session('usuario')->nombre.' '.session('usuario')->primer_apellido.' ' .session('usuario')->segundo_apellido;
        return $fullname;
    }

}

if(! function_exists('getPrefijo')){

    function getPrefijo(){
        $prefijo = strtoupper(substr(Auth::user()->nombre,0,1).substr(Auth::user()->primer_apellido,0,1));
        return $prefijo;
    }

}

if(! function_exists('getClaveUsuario')){

    function getClaveUsuario(){
        $clave = session('usuario')->cve_usuario;
        return $clave;
    }

}

if(! function_exists('getSessionPerfil')){

    function getSessionPerfil(){
    
        $roles = session('user')->roles;
        foreach ($roles as $role) {
            $perfil = $role->name;
        }
        return $perfil;

    }
}

if(! function_exists('getUser')){

    function getUser(){
        $user = session('usuario');
        return $user;
    }

}

/* 
*
*Separar cadena de texto unida por |
*
*/

if(! function_exists('toString'))
{

    function toString($object){
        $array = explode('|', $object);
        $string = implode('. ', $array);
        return $string;
    }

}

/* 
*
*Convertir objeto o arreglo en cadena de texto
*
*/

if(! function_exists('objectToString'))
{

    function objectToString($object){
        $array = [];

        if( gettype($object)  == 'array' ) {
            $object = (object) $object;
        }

        foreach($object as $row ){
            if( in_array(gettype($row), ['array','object'] )  ) {
                $array[] = objectToString($row);
            } else {
                $array[] = $row;
            }
        }

        return implode(', ', $array);
    }

}

/* 
*
*Convertir estatus en etiqueta de atencion
+
*/

if(! function_exists('statusToString'))
{

    function statusToString($estatus)
    {
        switch ($estatus) {
            case 1:
                $importancia = "Realizar";
                break;
            case 2:
                $importancia = "Urgente";
                break;
            case 3:
                $importancia = "Extra-Urgente";
                break;
            case 4:
                $importancia = "terminado";
                break;
            default:
                # code...
                break;
        }

        return $importancia;
    }
}

/*  
*
*Obtener etiqueta success|warning|primary|danger
*
*/

if(! function_exists('getLabelStatusTask'))
{

    function getLabelStatusTask($estatus)
    {
        switch ($estatus) {
            case 1:
                $etiqueta = "primary";
                break;
            case 2:
                $etiqueta = "warning";
                break;
            case 3:
                $etiqueta = "danger";
                break;
            case 4:
                $etiqueta = "success";
                break;
            default:
                $etiqueta = "info";
                break;
        }
        return $etiqueta;
    }
}

if (! function_exists('getStringFromObject')) 
{
    
    function getStringFromObject($object, $separador = ",")
    {
        $array = [];

        if( gettype($object)  == 'array' ) {
            $object = (object) $object;
        }

        foreach($object as $row ){
            if( in_array(gettype($row), ['array','object'] )  ) {
                $array[] = getStringFromObject($row, $separador);
            } else {
                $array[] = $row;
            }
        }

        return implode($separador, $array);
    }
}
