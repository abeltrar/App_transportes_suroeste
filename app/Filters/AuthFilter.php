<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verifica si el usuario ha iniciado sesión
        $session = session();
        if (!$session->get('isLoggedIn')) {

          
            // Si no ha iniciado sesión, redirige al controlador de inicio de sesión
            $baseUrl = base_url();
            return redirect()->to($baseUrl);
        }

       
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada después de la solicitud
    }
}