<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Tasks;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

                $user = User::factory()->create();
        
                $task = Tasks::factory()->make();
        
                $user -> task()->create($task->toarray());
                DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }
       
    }
}

