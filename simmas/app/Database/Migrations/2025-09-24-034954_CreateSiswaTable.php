<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'   => ['type' => 'INT', 'unsigned' => true],
            'nama'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'nis'       => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'kelas'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'jurusan'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat'    => ['type' => 'TEXT'],
            'telepon'   => ['type' => 'VARCHAR', 'constraint' => 20],
            'created_at'=> ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'=> ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
