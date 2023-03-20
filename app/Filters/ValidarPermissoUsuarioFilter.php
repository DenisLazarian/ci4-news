<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ValidarPermissoUsuarioFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($arguments == null) {
            if (!session()->get('loggedIn')) {
                return redirect()->to(base_url('user/login'));
            }
        } else {
            // $permissions = session()->get('permission');
            // if($permissions == null){
            //     session()->setFlashdata('error', 'Failed! User access no permited');
            //     return redirect()->back();
            // }
            // // dd($permissions[1]['action']);
            // for( $i = 0; $i < count($permissions); $i++ ) {
            //     // $arguments[$i] = (int) $arguments[$i];
            //     if (in_array($permissions[$i]['action'], $arguments)) {
            //         // echo ($permissions[$i]['action']);
            //         // d($permissions[$i]['action']);
            //         // dd("Si");
            //         // return redirect()->to(base_url('message/list'));
 
            //         // return redirect()->to(base_url('userdemo/login'));
            //     }
            // }
            // session()->setFlashdata('error', 'Failed! User access no permited');
            // return redirect()->back();

            $permissions = session()->get('permission');
            if ($permissions === null) {
                session()->setFlashdata('error', '¡Falló! No se encontraron permisos de usuario');
                return redirect()->to(base_url('user/login'));
            }

            $allowed = false;
            foreach ($permissions as $permission) {
                if ( in_array($permission['action'], $arguments)) {
                    $allowed = true;
                    // break;
                }
            }

            if (!$allowed) {
                session()->setFlashdata('error', '¡Falló! El usuario no tiene permiso para acceder a esta funcionalidad');
                return redirect()->back();
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
