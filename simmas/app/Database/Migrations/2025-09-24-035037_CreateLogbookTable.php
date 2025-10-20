<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogbookTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'magang_id'       => ['type' => 'INT', 'unsigned' => true],
            'tanggal'         => ['type' => 'DATE'],
            'kegiatan'        => ['type' => 'TEXT'],
            'kendala'         => ['type' => 'TEXT'],
            'file'            => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'status_verifikasi'=> ['type' => "ENUM('pending','disetujui','ditolak')"],
            'catatan_guru'    => ['type' => 'TEXT', 'null' => true],
            'catatan_dudi'    => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'      => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('magang_id', 'magang', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('logbook');
    }

    public function down()
    {
        $this->forge->dropTable('logbook');
    }
}
