<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
        public function up()
        {
                
                $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'auto_increment' => true,
                ],
                'username'      => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '100',
                ],
                'name'       => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '100',
                ],
                'email' => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '100',
                ],
                'password' => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '100',
                ],
                'id_group' => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => true,
                ],
                'created_at' => [
                        'type'           => 'DATETIME',
                        'null'           => true,
                ],
                'updated_at' => [
                        'type'           => 'DATETIME',
                        'null'           => true,
                ],
                'deleted_at' => [
                        'type'           => 'DATETIME',
                        'null'           => true,
                ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_group','group','id');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
