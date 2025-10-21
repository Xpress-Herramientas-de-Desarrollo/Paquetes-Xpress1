<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ClienteModel;

class Registro extends BaseController
{
    public function index()
    {
        return view('registro');
    }

    public function crear()
    {
        $request = \Config\Services::request();
        $session = session();

        $nombre = trim($request->getPost('nombre'));
        $apellido = trim($request->getPost('apellido'));
        $dni = trim($request->getPost('dni'));
        $correo = trim($request->getPost('correo'));
        $telefono = trim($request->getPost('telefono'));
        $usuario = trim($request->getPost('usuario'));
        $contrasena = trim($request->getPost('contrasena'));

        $usuarioModel = new UsuarioModel();
        $clienteModel = new ClienteModel();

        if ($usuarioModel->where('username', $usuario)->first()) {
            $session->setFlashdata('alerta', ['tipo' => 'error', 'mensaje' => 'El usuario ya existe.']);
            return redirect()->to('/registro');
        }

        if ($clienteModel->where('email', $correo)->first()) {
            $session->setFlashdata('alerta', ['tipo' => 'error', 'mensaje' => 'El correo ya está registrado.']);
            return redirect()->to('/registro');
        }

        if ($clienteModel->where('dni', $dni)->first()) {
            $session->setFlashdata('alerta', ['tipo' => 'error', 'mensaje' => 'El DNI ya está registrado.']);
            return redirect()->to('/registro');
        }

        try {
            $id_cliente = $clienteModel->insert([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'dni' => $dni,
                'email' => $correo,
                'telefono' => $telefono
            ], true);

            if (!$id_cliente)
                throw new \Exception("No se pudo crear el cliente.");

            $id_usuario = $usuarioModel->insert([
                'username' => $usuario,
                'password' => password_hash($contrasena, PASSWORD_DEFAULT),
                'tipo' => 'cliente',
                'id_cliente' => $id_cliente
            ]);

            if (!$id_usuario)
                throw new \Exception("No se pudo crear el usuario.");

            $session->setFlashdata('alerta', [
                'tipo' => 'success',
                'mensaje' => '¡Registro exitoso! Ahora puedes iniciar sesión.',
                'redirect' => base_url('login')
            ]);

            return redirect()->to('/registro');

        } catch (\Exception $e) {
            $session->setFlashdata('alerta', ['tipo' => 'error', 'mensaje' => 'Error: ' . $e->getMessage()]);
            return redirect()->to('/registro');
        }
    }
}
