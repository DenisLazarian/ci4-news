<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GroupModel;
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
            $modelGroup = new GroupModel();

            $email = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->getUserByMailOrUsername($email);
            $group = $modelGroup -> getGroupByUser($user['id']);


            if ($user) {
                if (password_verify($password, $user['password'])) {
                    
                    $config = [
                        "textColor"=>'#fff',
                        "backColor"=>'#FF1C1C',
                        // "noiceColor"=>'#162453',
                        "imgWidth"=>31,
                        "imgHeight"=>32,
                        "fontSize"=>10,
                        // "noiceLines"=>40,
                        // "noiceDots"=>20,
                        "length" =>3,
                        "text"=> strtoupper(substr($user['name'], 0, 1)),
                        // "expiration"=>5*MINUTE
                    ];
                    
            
                    $timage = new \App\Libraries\Text2Image($config);
            
                    $timage->textToImage()->html();
            
                    $timage->toJSON();
            
                    $captcha = json_decode($timage->toJSON());
                    d($captcha);
                    
                    
                    
                    // d("correct");
                    $sessionData = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'loggedIn' => true,
                        'captcha' => '<img class="rounded-circle  mt-1" src="data:image/png;base64,' . $timage->toImg64() . '" />',
                        'group' => $group[0]['name'],
                    ];



                    session()->set($sessionData);
                    return redirect()->to(base_url('public'));
                } else {
                    session()->setFlashdata('error', 'Failed! incorrect password');
                    return redirect()->to(base_url('user/login'));
                }
            }
        } else {
            return redirect()->to(base_url('user/login'));
        }
    }
    public function logout() {
        // dd("session destruida");
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
        d(session()->get('name'));

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
            'id_group'  => 2,
        ];

        $modelUser->saveUserRegister($data);


        return redirect()->to('public');
    }


    public function list(){

        session()->start();
        $model = new UserModel();
        $modelGroup = new GroupModel();

        $data['controller'] = "list-users";

        $data['title'] = "Gestió d'usuaris";

        $data['users'] = $model->getAllUsers();
        
        for($i=0; $i<count($data['users']); $i++){
            $data['users'][$i]['group'] = $modelGroup->getGroupByUser($data['users'][$i]['id']);
            
        }
        // dd($data['users'][0]['group'][0]['name']);
        // $data['users']['group']

        return view('user/private', $data);
    }

    public function edit($id){
        session()->start();

        $modelUser = new UserModel();
        $model = new GroupModel();

        $data['controller'] = "edit-user";
        $data['title'] = "Editar usuari";

        $data['user']= $modelUser->getUserById($id);

        $data['groups'] = $model->getGroups();
        
        
        return view('user/form', $data);

    }

    public function delete($id){

        session()->start();

        $modelUser = new UserModel();

        if($modelUser->deleteUser($id)){
            session()->setFlashdata('success', 'Usuari eliminat correctament');
        }

        return redirect()->to(base_url('user/list'));
    }

    public function update($id){
    
    
    }


    public function edit_post($id){
        session()->start();
        $request = \Config\Services::request();
        $modelUser = new UserModel();

        // $data['user'] = $modelUser->getUserById($id);
        // dd($request->getPost(['email', 'username', 'name', 'id_group']));
        // $modelUser -> allowEmptyInserts()->;
        $modelUser->updateUser($id, $request->getPost(['email', 'username', 'name', 'id_group']));
        
        return redirect()->to(base_url('user/list'));

        
    }

}
