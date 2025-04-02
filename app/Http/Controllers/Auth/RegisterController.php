<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Redirigir después del registro.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validar los datos de registro.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'documento' => ['required', 'numeric', 'unique:usuarios,documento'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,correo'],
            'saldo' => ['required', 'numeric', 'min:0', 'max:10000000'],
            'ciudad_nac' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Crear un nuevo usuario después del registro válido.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        return Usuarios::create([
            'documento' => $data['documento'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'saldo' => $data['saldo'],
            'ciudad_nac' => $data['ciudad_nac'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
