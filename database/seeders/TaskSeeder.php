<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                "title" => "Primera Tarea",
                "description" => "Descripcion primera tarea",
                "status" => "Pendiente",
                "due_date" => "2024-08-30"
            ],
            [
                "title" => "Segunda Tarea",
                "description" => "Descripcion Segunda tarea",
                "status" => "Iniciada",
                "due_date" => "2024-08-30"
            ],
            [
                "title" => "Tercera Tarea",
                "description" => "Descripcion Tercera tarea",
                "status" => "Terminada",
                "due_date" => "2024-08-30"
            ],
            [
                "title" => "Cuarta Tarea",
                "description" => "Descripcion Cuarta tarea",
                "status" => "Pendiente",
                "due_date" => "2024-08-31"
            ],
        ];

        Task::insert($tasks);
    }
}
