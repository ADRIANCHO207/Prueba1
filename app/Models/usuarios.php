<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Base class for authentication
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // Descomenta si usas Sanctum para APIs

// Es convención usar PascalCase para los nombres de clase en PHP/Laravel
class Usuarios extends Authenticatable
{
    // Traits estándar para funcionalidades comunes
    use HasFactory, Notifiable;
    // use HasApiTokens; // Descomenta si usas Sanctum

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'usuarios'; // Correcto, especifica la tabla

    /**
     * La clave primaria asociada con la tabla.
     * Por defecto, Laravel asume 'id'. Aquí le decimos que use 'documento'.
     *
     * @var string
     */
    protected $primaryKey = 'documento'; // <-- ¡MUY IMPORTANTE! Especifica tu PK

    /**
     * Indica si los IDs son auto-incrementales.
     * Como 'documento' no es auto-incremental, debe ser false.
     *
     * @var bool
     */
    public $incrementing = false; // <-- ¡MUY IMPORTANTE! Tu PK no se autoincrementa

    /**
     * El tipo de dato de la clave primaria.
     * Útil cuando no es el 'int' estándar de un autoincremental.
     * 'integer' funciona bien para bigInteger.
     *
     * @var string
     */
    protected $keyType = 'integer'; // <-- ¡IMPORTANTE! Especifica el tipo de tu PK

    /**
     * Indica si el modelo debe tener timestamps (created_at, updated_at).
     * Tu migración los tiene ($table->timestamps()), así que debe ser true.
     * @var bool
     */
    public $timestamps = true;

    /**
     * Los atributos que son asignables masivamente.
     * Asegúrate que coincidan con los campos que llenas en el registro
     * y las columnas de tu tabla.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documento',
        'nombre',
        'apellidos',
        'correo',
        'saldo',
        'ciudad_nac',
        'password', // Correcto, se llama 'password'
    ];

    /**
     * Los atributos que deben ocultarse para la serialización (ej. al convertir a JSON).
     * Es crucial ocultar la contraseña. 'remember_token' es necesario
     * si usas la funcionalidad "Recordarme" (necesitas la columna en la BD).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser casteados a tipos nativos.
     * Es MUY recomendado castear 'password' a 'hashed' en Laravel 10+
     * para que maneje automáticamente el hashing al asignar/crear.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime', // Si tuvieras verificación de email
        'password' => 'hashed',          // <-- ¡IMPORTANTE! Para auto-hashing
        'saldo' => 'decimal:2',        // Castea saldo a decimal con 2 lugares
    ];
}