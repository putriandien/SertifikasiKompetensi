<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSchoolSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'logo_url'        => ['type' => 'VARCHAR', 'constraint' => 500],
            'nama_sekolah'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'alamat'          => ['type' => 'TEXT'],
            'telepon'         => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'website'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'kepala_sekolah'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'npsn'            => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'created_at'      => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'      => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('school_settings');
    }

    public function down()
    {
        $this->forge->dropTable('school_settings');
    }
}