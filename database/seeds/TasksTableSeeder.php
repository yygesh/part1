<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 

        DB::table('tasks')->delete();
        $tasks=array(
        	['id'=>1,'name'=>'Task 1','slug'=>'task-1','project_id'=>1,'completed'=>false,'description'=>'My First Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>2,'name'=>'Task 2','slug'=>'task-2','project_id'=>1,'completed'=>false,'description'=>'My First Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>3,'name'=>'Task 3','slug'=>'task-3','project_id'=>1,'completed'=>false,'description'=>'My First Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>4,'name'=>'Task 4','slug'=>'task-4','project_id'=>1,'completed'=>true,'description'=>'My Second Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>5,'name'=>'Task 5','slug'=>'task-5','project_id'=>1,'completed'=>true,'description'=>'My Third Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>6,'name'=>'Task 6','slug'=>'task-6','project_id'=>2,'completed'=>true,'description'=>'My Forth Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	['id'=>7,'name'=>'Task 7','slug'=>'task-7','project_id'=>2,'completed'=>false,'description'=>'My Fifth Task','created_at'=>new DateTime,'updated_at'=>new DateTime],
        	
        	);
		DB::table('tasks')->insert($tasks);
    }
}
