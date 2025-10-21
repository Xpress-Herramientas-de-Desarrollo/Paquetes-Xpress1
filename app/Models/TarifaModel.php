<?php
namespace App\Models;

use CodeIgniter\Model;

class TarifaModel extends Model
{
    protected $table = 'tarifas';
    protected $primaryKey = 'id_tarifa';
    protected $allowedFields = [
        'descripcion',
        'peso_min',
        'peso_max',
        'costo_base',
        'costo_por_km',
        'fecha_registro'
    ];

    protected $useTimestamps = false;
}
