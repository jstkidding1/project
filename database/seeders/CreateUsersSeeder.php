<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Seth Pacaro',
               'email'=>'admin1@gmail.com',
                'announcement_admin'=>'1',
               'password'=> bcrypt('admin'),
            ],
            [
               'name'=>'Jade Tibon',
               'email'=>'admin2@gmail.com',
                'attendance_admin'=>'2',
               'password'=> bcrypt('admin'),
            ],
            [
               'name'=>'Mitch Huan',
               'email'=>'admin3@gmail.com',
                'report_admin'=>'3',
               'password'=> bcrypt('admin'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
