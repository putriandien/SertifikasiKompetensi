<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMagangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'siswa_id'       => ['type' => 'INT', 'unsigned' => true],
            'dudi_id'        => ['type' => 'INT', 'unsigned' => true],
            'guru_id'        => ['type' => 'INT', 'unsigned' => true],
            'status'         => ['type' => "ENUM('pending','diterima','ditolak','berlangsung','selesai','dibatalkan')"],
            'nilai_akhir'    => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'tanggal_mulai'  => ['type' => 'DATE'],
            'tanggal_selesai'=> ['type' => 'DATE'],
            'created_at'     => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'     => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('siswa_id', 'siswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dudi_id', 'dudi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('guru_id', 'guru', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('magang');
    }

    public function down()
    {
        $this->forge->dropTable('magang');
    }
}
