<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ClienteModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function autenticar()
    {
        $session = session();

        $usuarioInput = trim($this->request->getPost('usuario'));
        $contrasenaInput = trim($this->request->getPost('contrasena'));

        if (empty($usuarioInput) || empty($contrasenaInput)) {
            $session->setFlashdata('error', 'Usuario y contraseña son obligatorios.');
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $clienteModel = new ClienteModel();

        $usuario = $usuarioModel->autenticar($usuarioInput, $contrasenaInput);

        if (!$usuario) {
            $session->setFlashdata('error', 'Usuario o contraseña incorrectos.');
            return redirect()->to('/login');
        }

        $sessionData = [
            'id_usuario' => $usuario['id_usuario'],
            'username' => $usuario['username'],
            'tipo' => $usuario['tipo'],
            'logged_in' => true
        ];

        if ($usuario['tipo'] === 'cliente' && !empty($usuario['id_cliente'])) {
            $cliente = $clienteModel->find($usuario['id_cliente']);
            $sessionData['nombre'] = $cliente['nombre'] ?? '';
            $sessionData['apellido'] = $cliente['apellido'] ?? '';
            $sessionData['id_cliente'] = $usuario['id_cliente'];
        } else {
            $sessionData['nombre'] = $usuario['tipo'] === 'admin' ? 'Administrador' : 'Repartidor';
            $sessionData['apellido'] = '';
        }

        $session->set($sessionData);

        return match ($usuario['tipo']) {
            'admin' => redirect()->to('/admin/panel'),
            'repartidor' => redirect()->to('/repartidor/panel'),
            'cliente' => redirect()->to('/'),
            default => redirect()->to('/login'),
        };
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
