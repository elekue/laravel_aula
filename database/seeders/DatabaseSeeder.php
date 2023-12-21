<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Curso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Alumno::factory(50)->create();
        // Profesor::factory(10)->create();
        // Curso::factory(10)->create();
        $this->call(AlumnoCursoSeeder::class);
    }
}
