<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApplicants extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'graduated_from' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gpa_score' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,2',
            ],
            'portfolio_notes' => [
                'type'       => 'TEXT',
                'null'       => true, 
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('applicants');
    }

    public function down()
    {
        $this->forge->dropTable('applicants');
    }
}
