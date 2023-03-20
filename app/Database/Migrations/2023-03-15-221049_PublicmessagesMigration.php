<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PublicmessagesMigration extends Migration
{
    public function up()
{
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'auto_increment' => true,
                ],
                'name' =>[
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                        'null'           => true,
                ],
                
                'user_id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'null'           => true,
                ],
                'email' =>[
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                        'null'           => false,
                ],

                'assumpte'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                        'null'           => false,
                ],
                'body'          => [
                        'type'           => 'TEXT',
                        'null'           => false,
                ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id');
        
        $this->forge->createTable('message_contact');

}

public function down()
{
        $this->forge->dropTable('message_contact');
}
}
