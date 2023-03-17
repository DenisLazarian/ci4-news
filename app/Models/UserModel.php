<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    public function getUserByMailOrUsername($email) {
        // return $this->where('email',$email)->first();
        $query = $this->orWhere('email',$email)->orWhere('username',$email)->first();
        // dd($query);
        return $query;
    }
    
    public function saveUserRegister($data) {
        // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // dd($data);
        $this->table('user')->insert($data);
        // return $this->insertID();
    }

    public function getAllUsers() {
        $listUsers = $this->table('user')->findAll();
        return $listUsers;
    }

    public function getReportersEditorsAndAdmins() {

        $listUsers = $this->table('user')
        ->select('user.id,username,user.name,email,id_group')
        ->join('group g','g.id = user.id_group')
        ->where('g.name','reporter')
        ->orWhere('g.name','editor')
        ->orWhere('g.name','admin')
        ->findAll();

        return $listUsers;
    }

    public function getUserById($id) {
        $user = $this->table('user')->where('id',$id)->first();
        return $user;
    }

    public function updateUser($id, $data) {
        // d($id);
        $user = $this->table('user')->where('id',$id)->first();

        if (!empty($data)) {
            if(!$data['email']) ($data['email'] = $user['email']);
            if(!$data['name']) ($data['name'] = $user['name']);
            if(!$data['id_group']) ($data['id_group'] = $user['id_group']);
            if(!$data['username']) ($data['username'] = $user['username']);
            // d($data);


            $builder = $this->db->table('user');
            $builder->where('id',$id);
            $builder->update($data);
            
            // return $builder;
        } else {
            d('no hay datos');
            // handle the case where there is no data to update
        }

        
    }
    public function deleteUser($id) {
        $builder = $this->db->table('user');
        $builder->where('id',$id);
        $builder->delete();
    }
}