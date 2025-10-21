<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarifaModel;

class Tarifa extends BaseController
{
    protected $tarifaModel;

    public function __construct()
    {
        $this->tarifaModel = new TarifaModel();
    }

    public function precio()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'error' => 'Acceso no permitido']);
        }

        $data = $this->request->getJSON(true);
        $tamano = $data['tamano_paquete'] ?? null;

        if (!$tamano) {
            return $this->response->setJSON(['success' => false, 'error' => 'No se indicó el tamaño del paquete']);
        }

        $tarifa = $this->tarifaModel->where('descripcion', $tamano)->first();

        if (!$tarifa) {
            return $this->response->setJSON(['success' => false, 'error' => 'No se encontró la tarifa seleccionada']);
        }

        return $this->response->setJSON([
            'success' => true,
            'costo_base' => $tarifa['costo_base'],
            'peso_max' => $tarifa['peso_max']
        ]);
    }
}
