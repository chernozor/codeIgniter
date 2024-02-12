<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            //email
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'text' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at' => [
                'type' => 'INT',
                'constraint' => 14,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'INT',
                'constraint' => 14,
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'INT',
                'constraint' => 14,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('comment', true);
	}

	public function down()
	{
        $this->forge->dropTable('comment', true);
	}
}
