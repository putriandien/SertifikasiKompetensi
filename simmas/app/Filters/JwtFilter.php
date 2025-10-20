<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class JwtFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $token = $session->get('jwt_token');

        if (!$token) {
            return redirect()->to('/login')->with('error', 'token tidak ditemukan, silakan login ulang');
        }

        helper('jwt');
        $decoded = verify_jwt($token);

        if (!$decoded) {
            $session->destroy();
            return redirect()->to('/login')->with('error', 'token tidak valid atau kadaluarsa');
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
