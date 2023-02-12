<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Controllers\DateTime;

class NewsController extends BaseController
{
    public function index(){
    }
    public function list()
    {
        $model = new NewsModel();
        $data['news'] = $model->getNews();
        
        
        for ($i=0; $i < count($data['news']); $i++) { // cambiar el format de les dates
            
            $publicat = '<i class="bi bi-check text-success"></i> Publicat';
            $color = "#A0EECA";
            $date = date_create($data['news'][$i]['data_publicacio']);

            if(isset($date) && strtotime($data['news'][$i]['data_publicacio']) > strtotime(date("Y-m-d"),time())){ // comparo si la data es posterior o no, si es posterior vol dir que no esta publicat.
                $publicat='<i class="bi bi-clock"> </i>Pendent de publicació';
                $color = "#fff3cd";
            }

            $data['news'][$i]['state'] = $publicat;
            $data['news'][$i]['color'] = $color;

            
            // d($date);
            $data['news'][$i]['data_publicacio'] = date_format($date, 'd/m/Y H:i');
            
    
    
            
        }
        // d($data);

        return view("news/layouts/newssections",$data );
    }



    public function new_view($slug){
        
        $model = new NewsModel();

        $slug = str_replace(" ", "%", $slug);

        $data['news'] = $model->getNews($slug);

        $date = date_create($data['news']['data_publicacio']);

        $data['news']['state']="Publicat";
        if(isset($date) && strtotime($data['news']['data_publicacio']) > strtotime(date("Y-m-d"),time())){ // comparo si la data es posterior o no, si es posterior vol dir que no esta publicat.
            $data['news']['state']="s";
        }
            // d($date);
        $data['news']['data_publicacio'] = date_format($date, 'd/m/Y H:i');


        return view("news/layouts/newsshow", $data);
        // return view("news/list");
    }

    public function delete_new($slug){
        $model = new NewsModel();

        $session = \Config\Services::session();

        $session->setFlashdata('flash-message','Article eliminat amb exit'); // Amb aixo envio un missatge de confirmació, conforme s'ha borrat l'article

        $model -> deleteNews($slug);
        // dd("hola");

        // d("Noticia borrada");

        return redirect()->to(base_url('list'));
    }

    public function add_article(){

        $session = \Config\Services::session();
        
        helper('form');
        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return redirect()-> to(base_url('list'));
        }

        $post = $this->request->getPost(['articleTitle', 'articleText']);
        if (! $this->validateData($post, [
            'articleTitle' => 'required|max_length[255]|min_length[3]',
            'articleText'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.

            $error = $this->validator->getErrors();
            if(isset($error['articleTitle']))$session->setFlashdata('flash-message-validation-1',$error['articleTitle']?$error['articleTitle']: null);
            if(isset($error['articleText']))$session->setFlashdata('flash-message-validation-2',$error['articleText']?$error['articleText']: null);

            return redirect()-> to(base_url('list'));
        }

        $model = new NewsModel();
        $slug = str_replace(" ", "_", $_POST['articleTitle']);

        $data = [
            'titol' => $_POST['articleTitle'],
            'text' => $_POST['articleText'],
            'url' => $slug,
            'data_publicacio' => $_POST['publish-date']??date("Y-m-d H:i") // si no se li estableix una data programada, se li estableix la actual
        ];

        $model -> insertNew($data);

        $session = \Config\Services::session();

        $session->setFlashdata('flash-message','Article afegit amb exit');
        
        // dd("Noticia creada " .$_POST['articleTitle']." - ". $_POST['articleText']);

        return redirect()->to(base_url('list'));

    }

    public function edit_new($id){

        $session = \Config\Services::session();


        helper('form');

        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return redirect()-> to(base_url('list'));
                
        }
        $post = $this->request->getPost(['editTitle', 'editText']);

        if (! $this->validateData($post, [
            'editTitle' => 'required|max_length[255]|min_length[3]',
            'editText'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            $error = $this->validator->getErrors();
            if(isset($error['editTitle']))$session->setFlashdata('flash-message-validation-1',$error['editTitle']?$error['editTitle']: null);
            if(isset($error['editText']))$session->setFlashdata('flash-message-validation-2',$error['editText']?$error['editText']: null);

            return redirect()-> to(base_url('list'));
        
        }


        $model = new NewsModel();
        
        $slug = str_replace(" ", "_", $_POST['editTitle']);
        $data = [
            'titol' => $_POST['editTitle'],
            'text' => $_POST['editText'],
            'url' => $slug,
        ];

        
        
        $model -> edit($data, $id);

        $session = \Config\Services::session();

        $session->setFlashdata('flash-message','Article editat amb exit');
        
        return redirect()-> to(base_url('list'));
    }

    public function listPublishedNews(){

        $model = new NewsModel();

        $data['news'] = $model->getNewsPublished();
        
        
        return view("news/layouts/publicsections", $data);


    }
}
