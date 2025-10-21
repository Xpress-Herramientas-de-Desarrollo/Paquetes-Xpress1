<?php
namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table      = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'dni',
        'fecha_registro'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_registro';
    protected $updatedField  = ''; 

    protected $returnType = 'array';

    public function existeEmail(string $email): bool
    {
        return $this->where('email', $email)->first() !== null;
    }

    public function existeDNI(string $dni): bool
    {
        return $this->where('dni', $dni)->first() !== null;
    }
}
