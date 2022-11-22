<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KeteranganKriteriaPengajuan extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'pengajuan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'keterangan_kriteria_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
        ]);
        $this->forge->addForeignKey('pengajuan_id', 'pengajuans', 'id', '', 'cascade');
        $this->forge->addForeignKey('keterangan_kriteria_id', 'keterangan_kriterias', 'id', '', 'cascade');
        $this->forge->createTable('keterangan_kriteria_pengajuans');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('keterangan_kriteria_pengajuans');
    }
}
