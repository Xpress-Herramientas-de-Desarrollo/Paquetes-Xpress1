<?php
namespace App\Controllers;

use App\Models\SeguimientoModel;

class Seguimiento extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    private function actualizarRetrasados()
    {
        $this->db->query("
            UPDATE pedidos
            SET estado = 'Retrasado'
            WHERE estado NOT IN ('Entregado', 'Cancelado')
              AND fecha_programada < NOW()
        ");
    }

    private function obtenerMetricas()
    {
        $estados = ['Solicitado', 'Preparándose', 'En agencia', 'En camino', 'Entregado', 'Cancelado', 'Retrasado'];
        $metricas = [];

        $metricas['total'] = $this->db->table('pedidos')->countAllResults();

        foreach ($estados as $estado) {
            $key = str_replace(' ', '_', $estado);
            $metricas[$key] = $this->db->table('pedidos')->where('estado', $estado)->countAllResults();
        }

        return $metricas;
    }


    public function index()
    {
        $session = session();
        $this->actualizarRetrasados();

        $data = $this->obtenerMetricas();

        $pedidos = [];
        if ($session->get('tipo') === 'admin') {
            $pedidos = $this->db->table('pedidos')
                ->orderBy('fecha_programada', 'DESC')
                ->get()
                ->getResultArray();
        }

        $data['pedidos'] = $pedidos;
        $data['esAdmin'] = $session->get('tipo') === 'admin';

        return view('seguimiento', $data);
    }

    public function consultar()
    {
        $codigo = $this->request->getPost('codigo');
        $model = new SeguimientoModel();
        $pedido = $model->obtenerEnvioPorCodigo($codigo);

        if (!$pedido) {
            return redirect()->back()->with('error', 'No se encontró ningún pedido con ese código.');
        }

        $this->actualizarRetrasados();
        $data = $this->obtenerMetricas();

        $session = session();
        $pedidos = [];
        if ($session->get('tipo') === 'admin') {
            $pedidos = $this->db->table('pedidos')
                ->orderBy('fecha_programada', 'DESC')
                ->get()
                ->getResultArray();
        }

        $data = array_merge($data, [
            'pedido' => $pedido,
            'codigo' => $codigo,
            'pedidos' => $pedidos,
            'esAdmin' => $session->get('tipo') === 'admin'
        ]);

        return view('seguimiento', $data);
    }

    public function cambiarEstado($id_pedido)
    {
        $session = session();

        if (!$session->get('tipo') || $session->get('tipo') !== 'admin') {
            return $this->response->setJSON(['success' => false, 'message' => 'No tienes permisos']);
        }

        $nuevoEstado = $this->request->getPost('estado');
        $this->db->table('pedidos')
            ->where('id_pedido', $id_pedido)
            ->update(['estado' => $nuevoEstado]);

        return $this->response->setJSON(['success' => true]);
    }
}
