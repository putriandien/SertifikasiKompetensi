<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDudiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'          => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'nama_perusahaan'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'alamat'           => ['type' => 'TEXT'],
            'telepon'          => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'            => ['type' => 'VARCHAR', 'constraint' => 255],
            'penanggung_jawab' => ['type' => 'VARCHAR', 'constraint' => 255],
            'status'           => ['type' => "ENUM('aktif','nonaktif','pending')"],
            'created_at'       => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'       => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('dudi');
    }

    public function down()
    {
        $this->forge->dropTable('dudi');
    }
}
