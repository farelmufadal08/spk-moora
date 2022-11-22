<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class KeteranganKriteria extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'kriteria_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'keterangan_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'bobot_pilihan' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kriteria_id', 'kriterias', 'id', '', 'cascade');
        $this->forge->createTable('keterangan_kriterias');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('keterangan_kriterias');
    }
}
