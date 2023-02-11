<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'wallpaper';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['wallpaper'];

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

    

    public function getNews($slug=false){
        
        if ($slug===false) {
            return $this->table('wallpaper')->orderBy('data_publicacio','DESC')->findAll();
        }


        return $this->where('url',$slug)->first();

        // return $this->where(['slug'=>$slug])->first();
    }

    public function deleteNews($id){
        $db      = \Config\Database::connect();

        return $db->table('wallpaper')->where('id', $id)->delete();   // todo es similar a bases de datos, hay que hacer la consulta completa. Equivalente en SQL -> "Delete from wallpaper where id=$id"
    }

    public function insertNew($data){
        $db      = \Config\Database::connect();
        
        $builder = $db -> table("wallpaper");
        
        // Inserta los datos en la tabla "wallpaper"
        
        $builder->insert($data);
        
    }

    public function edit($data, $id){

        $db      = \Config\Database::connect();
        
        $builder = $db -> table("wallpaper");
        
        // Inserta los datos en la tabla "wallpaper"
        $builder->where('id',$id);
        
        $builder->update($data);
    }

}
