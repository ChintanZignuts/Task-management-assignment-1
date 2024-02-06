<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Task::create([
        //     'title'=>'meeting with client',
        //     'description'=>'meeting with client at 10:00 am',
        //     'due_date'=>'2024-02-06',
        //     'user_id'=>1,
        // ]);
        // Task::create([
        //     'title'=>'solw the issue',
        //     'description'=>'solve the issue of the project',
        //     'due_date'=>'2024-02-06',
        //     'user_id'=>1,
        // ]);
        // Task::create([
        //     'title'=>'meeting with client',
        //     'description'=>'meeting with client at 10:00 am',
        //     'due_date'=>'2024-02-06',
        //     'user_id'=>1,
        // ]);
        Task::factory(10)->create();

    }
}
