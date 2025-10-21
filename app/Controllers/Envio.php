<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PagoModel;
use App\Models\TarifaModel;

class Envio extends BaseController
{
    protected $pedidoModel;
    protected $pagoModel;
    protected $tarifaModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
        $this->pagoModel = new PagoModel();
        $this->tarifaModel = new TarifaModel();
    }

    public function index()
    {
        if (!session()->get('logged_in') || session()->get('tipo') !== 'cliente') {
            return redirect()->to('/login');
        }

        return view('envio'); 
    }

    public function guardar()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['error' => 'Acceso no permitido']);
        }

        $data = $this->request->getJSON(true);

        // Validar campos obligatorios
        $camposObligatorios = ['fecha_envio', 'tipo_envio', 'tamano_paquete', 'metodo_pago', 'nombre_destinatario'];
        foreach ($camposObligatorios as $campo) {
            if (empty($data[$campo])) {
                return $this->response->setJSON(['error' => "El campo $campo es obligatorio"]);
            }
        }

        $tipoEnvio = $data['tipo_envio']; 

        if ($tipoEnvio === 'enviopuerta') {
            $camposPuerta = ['nombre_remitente', 'direccion_origen', 'ciudad_origen', 'direccion_destino', 'ciudad_destino'];
            foreach ($camposPuerta as $campo) {
                if (empty($data[$campo])) {
                    return $this->response->setJSON(['error' => "El campo $campo es obligatorio para envíos a puerta"]);
                }
            }
        }

        if (isset($data['nombre_remitente']) && strtolower(trim($data['nombre_remitente'])) === 'yo') {
            $data['nombre_remitente'] = session()->get('nombre');
        }

        // Obtener tarifa según tamaño del paquete
        $tarifa = $this->tarifaModel->where('descripcion', $data['tamano_paquete'])->first();
        if (!$tarifa) {
            return $this->response->setJSON(['error' => 'No se encontró la tarifa seleccionada']);
        }

        $costoTotal = $tarifa['costo_base'] ?? 0;
        $peso = $tarifa['peso_max'] ?? 0;

        $tracking = 'PX-' . rand(100000, 999999);

        // Preparar datos del pedido
        $pedidoDatos = [
            'id_cliente' => session()->get('id_cliente'),
            'id_repartidor' => null,
            'id_tarifa' => $tarifa['id_tarifa'],
            'tipo_envio' => $tipoEnvio,
            'nombre_remitente' => $tipoEnvio === 'enviopuerta' ? $data['nombre_remitente'] : '',
            'direccion_origen' => $tipoEnvio === 'enviopuerta' ? $data['direccion_origen'] : '',
            'ciudad_origen' => $tipoEnvio === 'enviopuerta' ? $data['ciudad_origen'] : '',
            'nombre_destinatario' => $data['nombre_destinatario'],
            'direccion_destino' => $data['direccion_destino'] ?? '',
            'ciudad_destino' => $data['ciudad_destino'] ?? '',
            'distancia_km' => 0,
            'peso' => $peso,
            'costo_total' => $costoTotal,
            'estado' => 'Solicitado',
            'fecha_pedido' => date('Y-m-d H:i:s'),
            'fecha_programada' => $data['fecha_envio'],
            'fecha_entrega' => null,
            'codigo_tracking' => $tracking
        ];

        try {
            // Guardar pedido
            $pedidoId = $this->pedidoModel->insert($pedidoDatos);

            if (!$pedidoId) {
                return $this->response->setJSON(['error' => 'No se pudo registrar el pedido']);
            }

            // Guardar pago asociado
            $this->pagoModel->insert([
                'id_pedido' => $pedidoId,
                'metodo_pago' => $data['metodo_pago'],
                'monto' => $costoTotal,
                'estado' => 'Pagado'
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Pedido registrado correctamente.',
                'tracking' => $tracking,
                'costo_total' => $costoTotal 
            ]);


        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Error al registrar el pedido: ' . $e->getMessage()]);
        }
    }

}
