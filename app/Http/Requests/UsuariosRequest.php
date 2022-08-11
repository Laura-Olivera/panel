<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'usuario' => strtolower($this->usuario),
            'nombre' => mb_strtoupper($this->nombre),
            'primer' => mb_strtoupper($this->primer),
            'segundo' => mb_strtoupper($this->segundo),
        ]);
    }

    public function attributes()
    {
        return [
            'usuario' => 'nombre de usuario',
            'nombre' => 'nombre',
            'primer' => 'primer apellido',
            'email' => 'correo electronico',
            'password' => 'contraseña',
            'rpassword' => 'confirmar contraseña',
            'perfil' => 'perfil de usuario',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usuario' => 'required|unique:users,usuario',
            'nombre' => 'required',
            'primer' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'rpassword' => 'required',
            'perfil' => 'required',
            'area' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'unique' => 'El :attribute ya existe',
        ];
    }
}
