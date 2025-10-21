<?php
namespace App\Models;

use CodeIgniter\Model;

class SeguimientoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = [
        'codigo_tracking', 'estado', 'fecha_pedido', 'fecha_programada', 
        'fecha_entrega', 'id_cliente', 'tipo_envio', 'direccion_origen', 
        'direccion_destino', 'ciudad_origen', 'ciudad_destino', 'peso'
    ];

    // Obtiene el pedido por su código de tracking
    public function obtenerEnvioPorCodigo(string $codigo)
    {
        return $this->where('codigo_tracking', $codigo)->first();
    }
}
