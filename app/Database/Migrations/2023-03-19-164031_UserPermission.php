<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPermission extends Migration
{
    public function up()
{
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'auto_increment' => true,

                ],
                'user_id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                ],
                'permission_id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id');
        $this->forge->addForeignKey('permission_id', 'permission', 'id');
        
        $this->forge->createTable('user_permission');

}

public function down()
{
        $this->forge->dropTable('user_permission');
}
}
