<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatisticsUrl extends Migration
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
            'shorturl_id' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        
        $this->forge->addField("`deleted_at` datetime default NULL"); 
        $this->forge->addKey('id', true);
        $this->forge->createTable('statistics_url');
    }

    public function down()
    {
        $this->forge->dropTable('statistics_url');
    }
}
