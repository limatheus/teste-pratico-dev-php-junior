<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Tasks;
use database\factories\TaskFactory;


class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = Tasks::factory()->create();

    }
}
