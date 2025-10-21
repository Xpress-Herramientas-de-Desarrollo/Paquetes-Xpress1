<?php
namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = [
        'id_cliente',
        'tipo_envio',
        'id_agencia_origen',
        'id_agencia_destino',
        'nombre_remitente',
        'direccion_origen',
        'ciudad_origen',
        'nombre_destinatario',
        'direccion_destino',
        'ciudad_destino',
        'peso',
        'costo_total',
        'fecha_programada',
        'codigo_tracking',
        'estado',
        'id_tarifa'
    ];

    protected $useTimestamps = false; 
}
