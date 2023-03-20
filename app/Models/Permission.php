<?php

namespace App\Models;

use CodeIgniter\Model;

class Permission extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permission';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["permission"];

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

    public function getAllByUser($id){

        $perms = $this->db->table('permission')
        ->join('user_permission up', 'up.permission_id = permission.id')
        ->join('user u ', 'u.id = up.user_id')
        ->where('u.id', $id)

        ->get()->getResultArray();
        // dd($perms);
        return $perms;
    }
}
