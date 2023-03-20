<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'group';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','description'];

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


    public function getGroups() {
        return $this->table('group')->findAll();
    }

    public function getGroup($id) {
        return $this->table('group')->where('id',$id)->first();
    }


    public function getGroupByUser($id) {

        $group = $this->table('group')
        ->select('group.id, group.name')
        ->join('user','user.id_group = group.id')
        ->where('user.id',$id)->findAll();

        // dd($group);
            
        return $group;
    }

    public function updateGroup($id, $data){
        $group = [
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id
        ];
        // dd($data);
        $this->db->table('group')->where('id',$id)->update($group);
    }

    public function deleteGroup($id){
        $this->db->table('group')->where('id',$id)->delete();
    }

    public function addGroup($data){
        $group = [
            'name' => $data['name'],
            'description' => $data['description'],
        ];
        $this->db->table('group')->insert($group);
    }


}
