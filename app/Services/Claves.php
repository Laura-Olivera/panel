<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Claves 
{

    /**
     * Genera clave que no exista en base de datos
     * @param string $tabla 
     * @param string $campo
     * 
     */ 
    public function generarClave($tabla, $campo)
    {
        $existe = true;
        while ($existe) {
            $clave = $this->get_clave($tabla);
            $existe = $this->buscarClave($tabla, $campo, $clave);
        }

        return $clave;
    }

    /**
     * Comprueba si la clave existe en base de datos
     * @param string $tabla 
     * @param string $campo
     * @param string $clave
     * @return boolean $existe
     *      
     */ 
    public function buscarClave($tabla, $campo, $clave)
    {
        try {
            $existe = DB::table($tabla)->where($campo, '=', $clave)->exists();
            return (boolean) $existe;
        } catch (\Throwable $th) {
            Log::warning(__METHOD__."--->Line:".$th->getLine()."----->".$th->getMessage());
            return $existe = true;
        }
    }

    /**
     * Create new random clave 
     * @param string $tabla nombre de la tabla
     * @return string clave random
     *  
     */
    public function get_clave($tabla)
    {
        $subs = substr($tabla, 0, 1);
        $char = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $random_str = substr($char, 0, 3);
        $num = str_pad(1, 6, "0", STR_PAD_LEFT);
        $clave = strtoupper($subs.$random_str.$num);
        return $clave;
        
    }

    /**
     * Create consecutive user id
     * 
     * 
     */
    public function no_usuario(){
        $consecutivo = User::all()->count();
                
    }

    
}
