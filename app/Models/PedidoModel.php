<?php
namespace App\Models;
use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = [
        'id_cliente', 'direccion_origen', 'ciudad_origen',
        'direccion_destino', 'ciudad_destino', 'peso', 'estado',
        'fecha_pedido', 'fecha_entrega'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'fecha_pedido';
}
