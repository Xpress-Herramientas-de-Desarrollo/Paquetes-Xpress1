<?php
namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';         
    protected $primaryKey = 'id_pedido';  

    protected $useAutoIncrement = true;
    protected $returnType = 'array';       
    protected $useTimestamps = false;     

    protected $allowedFields = [
        'id_cliente',
        'id_repartidor',
        'id_tarifa',
        'tipo_envio',
        'nombre_remitente',
        'direccion_origen',
        'ciudad_origen',
        'nombre_destinatario',
        'direccion_destino',
        'ciudad_destino',
        'distancia_km',
        'peso',
        'costo_total',
        'estado',
        'fecha_pedido',
        'fecha_programada',
        'fecha_entrega',
        'codigo_tracking'
    ];

    protected $validationRules = [
        'id_cliente' => 'required|integer',
        'tipo_envio' => 'required|in_list[enviopuerta,enviolocal]',
        'nombre_destinatario' => 'required|string|max_length[100]',
        'direccion_origen' => 'permit_empty|string|max_length[255]',
        'ciudad_origen' => 'permit_empty|string|max_length[50]',
        'direccion_destino' => 'permit_empty|string|max_length[255]',
        'ciudad_destino' => 'permit_empty|string|max_length[50]',
        'codigo_tracking' => 'permit_empty|string|max_length[20]'
    ];

    protected $validationMessages = [
        'tipo_envio' => [
            'in_list' => 'El tipo de envío debe ser enviopuerta o enviolocal'
        ]
    ];
}
