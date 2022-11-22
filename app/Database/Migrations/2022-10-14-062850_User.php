<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class User extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true
            ],
            'kelompok_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,

                'null' => true
            ],

            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'pegawai', 'kelompokternak'],
                'default' => 'admin'
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
        $this->forge->addUniqueKey('email');
        $this->forge->addForeignKey('kelompok_id', 'alternatifs', 'id', "", "cascade");

        $this->forge->createTable('users');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
