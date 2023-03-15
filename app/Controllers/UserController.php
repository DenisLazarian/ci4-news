<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data['title'] = "Login usuaris";
        $data['controller'] = "login";

        echo view("user/form", $data);
    }
    public function login_post()
    {
        //@see https://codeigniter.com/user_guide/libraries/validation.html

        // $validationRules = [
        //     'txtEmail' => 'required|valid_email',
        //     'txtPass' => 'required|min_length[4]'
        // ];
        $validationRules =
            [
                'username' => [
                    'label'  => 'eMail usuari',
                    'rules'  => 'required',     // |valid_email',
                    'errors' => [
                        'required' => 'eMail es un camp obligatori',
                        'valid_email' => 'No és un mail valid',
                    ],
                ],
                'password' => [
                    'label'  => 'Contrasenya usuari',
                    'rules'  => 'required|min_length[4]',
                    'errors' => [
                        'min_length' => 'La clau ha de tenir més de 3 caracters',
                        'required' => 'La clau és un camp obligatori',
                    ],
                ],
            ];

        if ($this->validate($validationRules)) {

            $model = new UserModel();

            $email = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->getUserByMailOrUsername($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    d("correct");
                    $sessionData = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'loggedIn' => true,
                    ];

                    session()->set($sessionData);
                    return redirect()->to(base_url('user/private'));
                } else {
                    session()->setFlashdata('error', 'Failed! incorrect password');
                    return redirect()->to(base_url('user/login'));
                }
            }
        } else {
            return redirect()->to(base_url('user/login'));
        }
    }
    public function logout () {
        session()->destroy();
        return redirect()->to(base_url('user/login'));
    }

    public function register()
    {
        $data['title'] = "Registre usuaris";
        $data['controller'] = "register";

        echo view("user/form", $data);
    }
    public function private_dashboard($type="")
    {

        $data["title"] = "Pagina privada ".$type;
        return view("user/private", $data);
    }


    public function contact(){
        $data["title"] = "Contacte";
        $data["controller"] = "contact";
        return view("user/form", $data);
    }



    public function registerUserPost(){

        $request = \Config\Services::request();
        $modelUser = new UserModel();
        $session = \Config\Services::session();


        $validationRules =
            [
                'email' => [
                    'label'  => 'eMail usuari',
                    'rules'  => 'required|valid_email',     // |valid_email',
                    'errors' => [
                        'required' => 'eMail es un camp obligatori',
                        'valid_email' => 'No és un mail valid',
                    ],
                ],
                'password' => [
                    'label'  => 'Contrasenya usuari',
                    'rules'  => 'required|min_length[4]',
                    'errors' => [
                        'min_length' => 'La clau ha de tenir més de 3 caracters',
                        'required' => 'La clau és un camp obligatori',
                    ],
                ],
                'name' => [
                    'label'  => 'Nom usuari',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'El nom és un camp obligatori',
                    ],
                ],
            ];

        $post = $request->getPost(['email', 'password', 'name' ]);
        // dd($post);

        if(!$this->validate( $validationRules)){
            $error = $this->validator->getErrors();
            // d($error);
            // d('algo pasa');

            if(isset($error['email']))session()->setFlashdata('error-mail', $error['email']);
            if(isset($error['password']))session()->setFlashdata('error-pass', $error['password']);
            if(isset($error['name']))session()->setFlashdata('error-name', $error['name']);

            // return redirect()->to(base_url('register'));

            $data['title'] = "Registre usuaris";
            $data['controller'] = "register";
            return view('user/form', $data);
        }


        $data = [
            'name'      => $request->getPost('name'),
            'username'  => $request->getPost('username'),
            'email'     => $request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            
        ];

        $modelUser->saveUserRegister($data);


        return redirect()->to('public');
    }

}
