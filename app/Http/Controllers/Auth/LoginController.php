<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // Puedes cambiar '/home' a la ruta deseada después del login

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplica el middleware 'guest' a todos los métodos excepto 'logout'
        // Esto significa que solo los usuarios no autenticados pueden acceder a la página de login y al proceso de login
        $this->middleware('guest')->except('logout');

        // Aplica el middleware 'auth' solo al método 'logout'
        // Esto significa que solo los usuarios autenticados pueden cerrar sesión
        // Nota: Esta línea es redundante si ya usas ->except('logout') en la línea anterior,
        // pero no causa problemas. La dejé como estaba en tu original.
        $this->middleware('auth')->only('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        // ****** ESTE ES EL CAMBIO PRINCIPAL ******
        // Sobrescribimos el método username() del trait AuthenticatesUsers
        // para indicar que el campo que se usará para buscar al usuario
        // en la base de datos durante el login es 'documento'
        // en lugar del predeterminado 'email'.
        return 'documento';
        // ****** FIN DEL CAMBIO PRINCIPAL ******
    }

    // Nota: No necesitas modificar nada más en este controlador para
    // cambiar el campo de autenticación si solo quieres usar 'documento'
    // y 'password'. Laravel se encargará del resto usando el trait
    // AuthenticatesUsers y este método username().
}