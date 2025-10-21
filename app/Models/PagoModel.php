<?php
namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';
    protected $allowedFields = [
        'id_pedido',
        'metodo_pago',
        'monto',
        'estado'
    ];

    protected $useTimestamps = false;
}
