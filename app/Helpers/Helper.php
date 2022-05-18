<?php

if(! function_exists('getCompleteName')){

    function getCompleteName(){
        $fullname = session('empleado')->nombre.' '.session('empleado')->primer_apellido.' ' .session('empleado')->segundo_apellido;
        return $fullname;
    }
    
}

if(! function_exists('getClaveEmpleado')){

    function getClaveEmpleado(){
        $clave = session('empleado')->clave_empleado;
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