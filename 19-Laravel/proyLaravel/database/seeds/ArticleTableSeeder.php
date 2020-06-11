<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Halo Master Collection',
            'image' => 'imgs/1590699256.jpeg',
            'content' => 'Es una remasterización de los videojuegos de disparos en primera persona de la saga Halo para la consola Xbox One, el cual salió a la venta en Estados Unidos el 11 de noviembre de 2014 y en Europa el 14 de noviembre del mismo año.',
            'user_id' => 3,
            'category_id' => 1,
            'slider' => 2,
            'price' => 60,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'God Of War',
            'image' => 'imgs/1590699063.jpeg',
            'content' => 'Es un videojuego de acción-aventura desarrollado por SCE Santa Monica Studio y publicado por Sony Interactive Entertainment.',
            'user_id' => 3,
            'category_id' => 2,
            'slider' => 2,
            'price' => 55,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'Fornite',
            'image' => 'imgs/1590699159.jpeg',
            'content' => 'Es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor general de juego y las mecánicas.',
            'user_id' => 3,
            'category_id' => 2,
            'slider' => 2,
            'price' => 45,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'Call Of Duty Modern Warfare',
            'image' => 'imgs/1590701318.jpeg',
            'content' => 'Es un videojuego de disparos en primera persona desarrollado por Infinity Ward y publicado por Activision. Es el decimosexto juego de la saga Call of Duty y es un reboot de la serie Modern Warfare',
            'user_id' => 3,
            'category_id' => 2,
            'slider' => 1,
            'price' => 70,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'Forza motorsport 7',
            'image' => 'imgs/1590703489.jpeg',
            'content' => 'Es un videojuego de carreras desarrollado por Turn 10 Studios y distribuido por Microsoft Studios.',
            'user_id' => 3,
            'category_id' => 1,
            'slider' => 2,
            'price' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'Grand Theft Auto V',
            'image' => 'imgs/1590794234.jpeg',
            'content' => 'Es un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games. Fue lanzado el 17 de septiembre de 2013 para las consolas PlayStation 3 y Xbox 360.',
            'user_id' => 5,
            'category_id' => 1,
            'slider' => 1,
            'price' => 40,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('articles')->insert([
            'title' => 'recident evil',
            'image' => 'imgs/1591113411.jpeg',
            'content' => 'Es un videojuego perteneciente al género de acción y aventura y horror de supervivencia, desarrollado y publicado por la empresa Capcom.',
            'user_id' => 4,
            'category_id' => 2,
            'slider' => 1,
            'price' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
