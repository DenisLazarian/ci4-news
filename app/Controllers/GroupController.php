<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GroupController extends BaseController
{
    
    public function list(){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        // $data['groups'] = $groupModel->getGroups();
        $data['title'] = 'List of groups';
        $data['controller'] = 'list-groups';

        $data['groups'] = $groupModel->paginate(5);
        $data['pager'] = $groupModel->pager;

        // dd($data['groups']);
        // echo view('templates/header');
        // echo view('templates/menu');
        // echo view('group/list',$data);
        // echo view('templates/footer');
        return view('group/private',$data);
    }

    public function edit($id){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        // $data['group'] = $groupModel->getGroup($this->request->uri->getSegment(3));
        $data['title'] = 'Editar grup';
        $data['controller'] = 'edit-group';
        $data['group'] = $groupModel->getGroup($id);

        
        return view('group/form',$data);
    }

    function editGroup($id){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        // dd($this->request->getGet('id'));
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $groupModel->updateGroup($id, $data);

        return redirect()->to(base_url('group/list'));
    }

    public function create(){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        $data['title'] = 'Create group';
        $data['controller'] = 'create-group';

        return view('group/form',$data);
    }


    public function delete($id){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        $groupModel->deleteGroup($id);

        return redirect()->to(base_url('group/list'));
    }

    public function add(){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        // $data['group'] = $groupModel->getGroup($this->request->uri->getSegment(3));
        $data['title'] = 'Crear grup';
        $data['controller'] = 'create-group';
        

        return view('group/form',$data);
    }

    public function addGroup_post(){
        session()->start();
        $groupModel = new \App\Models\GroupModel();
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $groupModel->addGroup($data);

        return redirect()->to(base_url('group/list'));
    }
}
