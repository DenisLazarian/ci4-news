<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Condig\database;

class NewsMigration extends Migration
{
    public function up()
    {
        // $forge = \Config\Database::forge();
        // if($forge->createDatabase('news-mini-cms', true)){
        //     d("Database created");
        // }

        $this -> forge -> addField([
            // Aqui dentro va las columnas de la tabla
            'id'                => [
                'type'                  => 'INT',
                'constraint'            => 11,
                'auto_increment'        => true
            ],
            'titol'             =>[
                'type'                  => 'VARCHAR(55)',
                'null'                  => false
            ],
            'text'              =>[
                'type'                  => 'TEXT',
                'null'                  => false
            ],
            'url'               =>[
                'type'                  => 'VARCHAR(255)',
                'null'                  => false
            ],
            'data_publicacio'   =>[
                'type'                  => 'DATE',
                'null'                  => false
            ],
            'author_id' => [
                'type' => 'INT(11)',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id','user','id');
        $this->forge->createTable('wallpaper');
    }

    public function down()
    {
        $this->forge->dropTable('wallpaper');
    }
}
