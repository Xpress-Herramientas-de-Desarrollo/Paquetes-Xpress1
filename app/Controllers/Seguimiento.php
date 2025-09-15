<?php
namespace App\Controllers;
use App\Models\PedidoModel;

class Seguimiento extends BaseController
{
    public function index()
    {
        return view('seguimiento');
    }

    public function consultar()
    {
        $codigo = $this->request->getPost('codigo');

        $id_pedido = intval(substr($codigo, 2));

        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->where('id_pedido', $id_pedido)->first();

        if ($pedido) {
            return view('seguimiento', ['pedido' => $pedido, 'codigo' => $codigo]);
        } else {
            session()->setFlashdata('error', "No se encontró ningún envío con el código $codigo");
            return redirect()->to('/seguimiento');
        }
    }
}
