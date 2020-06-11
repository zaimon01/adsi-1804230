<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Jeremias Sprinfiel',
            'email' => 'jeremias@gmail.com',
            'phone' => 3123212344,
            'birthdate' => '1950-11-12',
            'gender' => 'Male',
            'address' => 'Street Siempre Viva',
            'role' => 'Admin',
            'password' => Hash::make('admin'),
        ]);

        $user = new App\User;
        $user->fullname = 'Simon Osorio Castaño';
        $user->email = 'zaiimon3@gmail.com';
        $user->phone = 3194504535;
        $user->birthdate = '1997-05-03';
        $user->gender = 'Male';
        $user->address = 'calle 100 a # 32 b 25';
        $user->role = "Admin";
        $user->password = bcrypt('admin');
        $user->save();

        factory(App\User::class, 50)->create();
    }
}
