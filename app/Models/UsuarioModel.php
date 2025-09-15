<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $allowedFields = [
        'username',
        'password',
        'tipo',
        'id_cliente'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $createdField  = 'fecha_registro';

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[usuarios.username]',
        'password' => 'required|min_length[6]'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'El nombre de usuario es obligatorio.',
            'min_length' => 'El nombre de usuario debe tener al menos 3 caracteres.',
            'is_unique' => 'Este nombre de usuario ya está en uso.'
        ],
        'password' => [
            'required' => 'La contraseña es obligatoria.',
            'min_length' => 'La contraseña debe tener al menos 6 caracteres.'
        ]
    ];

    protected $skipValidation = false;
}
