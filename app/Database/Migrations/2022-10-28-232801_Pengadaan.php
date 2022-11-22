<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengadaan extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'nama_pengadaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1
            ]
        ]);

        $this->forge->addUniqueKey('id');
        $this->forge->createTable('pengadaans');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('pengadaans');
    }
}
