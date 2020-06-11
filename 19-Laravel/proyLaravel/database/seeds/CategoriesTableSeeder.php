<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Category = new App\Category;
        $Category->name = 'Xbox One';
        $Category->description = "Juegos y accesorios para xbox one";
        $Category->image = 'imgs/1590247612.png';
        $Category->save();

        $Category = new App\Category;
        $Category->name = 'Play Station 4';
        $Category->description = "Juegos y accesorios para play station 4";
        $Category->image = 'imgs/1589929536.png';

        $Category->save();
        
    }
}
