<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ShortUrl extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'short_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'qrcode' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        
        $this->forge->addField("`deleted_at` datetime default NULL"); 
        $this->forge->addKey('id', true);
        $this->forge->createTable('short_url');
    }

    public function down()
    {
        $this->forge->dropTable('short_url');
    }
}
