<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Kriteria extends Migration
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
            'kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'kode_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true
            ],
            'tipe_pilihan' => [
                'type' => 'ENUM',
                'constraint' => ['radio', 'checkbox'],
                'default' => 'radio'
            ],
            'cost_benefit' => [
                'type' => 'ENUM',
                'constraint' => ['cost', 'benefit'],
                'default' => 'benefit'
            ],
            'bobot_kriteria' => [
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
        $this->forge->addUniqueKey('kode_kriteria');
        $this->forge->createTable('kriterias');
    }

    public function down()
    {
        $this->forge->dropTable('kriterias');
    }
}
