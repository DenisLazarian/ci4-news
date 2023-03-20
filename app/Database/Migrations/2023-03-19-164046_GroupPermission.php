<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GroupPermission extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                        'auto_increment' => true,

                    ],
                    'permission_id'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                    ],
                    'group_id'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                    ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('permission_id', 'permission', 'id');
            $this->forge->addForeignKey('group_id', 'group', 'id');
            
            $this->forge->createTable('group_permission');

    }

    public function down()
    {
            $this->forge->dropTable('group_permission');
    }
}
