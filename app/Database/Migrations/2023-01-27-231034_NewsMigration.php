<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewsMigration extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
            // Aqui dentro va las columnas de la tabla
            'id'                => [
                'type'                  => 'INT',
                'constraint'            => 5,
                'unsigned'              => true,
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
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wallpaper');
    }

    public function down()
    {
        $this->forge->dropTable('wallpaper');
    }
}
