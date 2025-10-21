<?php

namespace App\Models;
use CodeIgniter\Model;

class AgenciaModel extends Model
{
    protected $table = 'agencias';
    protected $primaryKey = 'id_agencia';
    protected $allowedFields = ['nombre', 'direccion', 'ciudad', 'telefono', 'horario_atencion'];
    protected $useTimestamps = true;
}
