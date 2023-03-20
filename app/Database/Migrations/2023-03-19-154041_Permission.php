<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permission extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,

                        'auto_increment' => true,

                    ],
                    'action'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
                    ],
                    'description'          => [
                            'type'           => 'TEXT',
                    ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('permission');
    }

    public function down()
    {
            $this->forge->dropTable('permission');
    }
}
