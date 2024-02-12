<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        $time = '06.02.2024 01:01:01';
        $data = [
            'name' => 'test1@test.ru',
            'text' => 'London is the capital of GB',
            'date' => $time,
            'created_at' => strtotime($time),
        ];

        $this->db->query('INSERT INTO comment (`name`, `text`, `date`) VALUES(:name:, :text:, :date)', $data);

        $this->db->table('comment')->insert($data);
    }
}
