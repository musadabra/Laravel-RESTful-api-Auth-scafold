<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project')->insert([
            'user_id' => 1,
            'title' => 'Welcome',
            'date' => date("Y-m-d", time()),
            'dueDate' => date("Y-m-d", time()),
            'description' => 'Welcome to TO-DO this is a sample project',
        ]);
    }
}
