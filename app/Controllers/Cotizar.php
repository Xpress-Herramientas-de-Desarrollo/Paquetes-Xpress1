<?php

namespace App\Controllers;

class Cotizar extends BaseController
{
    public function index()
    {
        return view('cotizar');
    }

    public function calcular()
    {
        $origen = trim($this->request->getPost('origen'));
        $destino = trim($this->request->getPost('destino'));
        $peso = floatval($this->request->getPost('peso'));

        // Lógica de cotización
        $tarifa = 10 + ($peso * 2.5);

        $data = [
            'origen' => $origen,
            'destino' => $destino,
            'peso' => $peso,
            'tarifa' => $tarifa
        ];

        return view('cotizar', $data);
    }
}
