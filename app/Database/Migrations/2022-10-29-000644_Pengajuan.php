<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Pengajuan extends Migration
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
            'pengadaan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'nomor_registrasi' => [
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
            'proposal' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['masuk', 'diterima', 'menerima'],
                'default' => 'masuk'
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'cascade');
        $this->forge->addForeignKey('pengadaan_id', 'pengadaans', 'id', '', 'cascade');
        $this->forge->createTable('pengajuans');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('pengajuans');
    }
}
