<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'email_verified_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'password'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'              => ['type' => "ENUM('admin','siswa','guru','dudi')"],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}