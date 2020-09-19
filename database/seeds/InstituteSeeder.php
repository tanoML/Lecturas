<?php

use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seccion para el campus tehuantepec
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Computación'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Diseño'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Petróleos'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Química'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Industrial'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Licenciatura en Matemáticas Aplicadas'
        ]);
        App\Institute::create([
            'id_campus' => 1,
            'carrera' => 'Ingeniería en Energías Renovables'
        ]);
        //Seccion para el campus ixtepec
        App\Institute::create([
            'id_campus' => 2,
            'carrera' => 'Licenciatura en Informática'
        ]);
        App\Institute::create([
            'id_campus' => 2,
            'carrera' => 'Licenciatura en Derecho'
        ]);

        App\Institute::create([
            'id_campus' => 2,
            'carrera' => 'Licenciatura en Ciencias Empresariales'
        ]);

        App\Institute::create([
            'id_campus' => 2,
            'carrera' => 'Licenciatura en Administración Pública'
        ]);
        //Seccion para el campus juchitan
        App\Institute::create([
            'id_campus' => 3,
            'carrera' => 'Licenciatura en Nutrición'
        ]);
        App\Institute::create([
            'id_campus' => 3,
            'carrera' => 'Licenciatura en Enfermería'
        ]);



    }
}
