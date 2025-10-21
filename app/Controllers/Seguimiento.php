<?php
namespace App\Controllers;

use App\Models\SeguimientoModel;

class Seguimiento extends BaseController
{
    public function index()
    {
        return view('seguimiento');
    }

    public function consultar()
    {
        $codigo = $this->request->getPost('codigo');

        // Validamos que el usuario haya ingresado algo
        if (empty($codigo)) {
            session()->setFlashdata('error', 'Por favor, ingresa un código o ID de envío.');
            return redirect()->to('/seguimiento');
        }

        $seguimientoModel = new SeguimientoModel();
        $pedido = $seguimientoModel->obtenerEnvioPorCodigo($codigo); // Cambié a "por código"

        if ($pedido) {
            return view('seguimiento', ['pedido' => $pedido, 'codigo' => $codigo]);
        } else {
            session()->setFlashdata('error', "No se encontró ningún envío con el código $codigo");
            return redirect()->to('/seguimiento');
        }
    }
}
