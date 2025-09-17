<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function autenticar()
    {
        $session = session();

        try {
            $usuarioInput = trim($this->request->getPost('usuario'));
            $contrasenaInput = trim($this->request->getPost('contrasena'));

            if (empty($usuarioInput) || empty($contrasenaInput)) {
                $session->setFlashdata('error', 'Usuario y contraseña son obligatorios.');
                return redirect()->to('/login');
            }

            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->where('username', $usuarioInput)->first();

            if (!$usuario) {
                $session->setFlashdata('error', 'Usuario o contraseña incorrectos.');
                return redirect()->to('/login');
            }

            if (!password_verify($contrasenaInput, $usuario['password'])) {
                $session->setFlashdata('error', 'Usuario o contraseña incorrectos.');
                return redirect()->to('/login');
            }

            // Guardar sesión
            $session->set([
                'id_usuario' => $usuario['id_usuario'],
                'username' => $usuario['username'],
                'tipo' => $usuario['tipo']
            ]);

            if ($usuario['tipo'] === 'cliente' && !empty($usuario['id_cliente'])) {
                $db = \Config\Database::connect();
                $cliente = $db->table('clientes')
                              ->select('nombre, apellido')
                              ->where('id_cliente', $usuario['id_cliente'])
                              ->get()
                              ->getRowArray();

                $session->set([
                    'nombre' => $cliente['nombre'] ?? '',
                    'apellido' => $cliente['apellido'] ?? ''
                ]);
            } else {
                $session->set([
                    'nombre' => 'Administrador',
                    'apellido' => ''
                ]);
            }

            return redirect()->to('/sistema'); 
        } catch (\Exception $e) {
            $session->setFlashdata('error', 'Ocurrió un error al iniciar sesión: ' . $e->getMessage());
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }


    public function sistemaindex()
    {
        return view('sistema-registropaquetes');
    }

}
