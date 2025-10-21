<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'username',
        'password',
        'tipo',
        'id_cliente',
        'fecha_registro'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_registro';
    protected $updatedField = '';

    protected $returnType = 'array';

    public function existeUsuario(string $username): bool
    {
        return $this->where('username', $username)->first() !== null;
    }

    public function autenticar(string $username, string $password): ?array
    {
        $usuario = $this->where('username', $username)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }

        return null;
    }
}
