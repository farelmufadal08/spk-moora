<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'simluhtan' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'nama_kelompok' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'nama_ketua' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'nomor_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 250
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
        $this->forge->addUniqueKey('simhluhtan');
        $this->forge->createTable('alternatifs');
    }

    public function down()
    {
        $this->forge->dropTable('alternatifs');
    }
}
