<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Meiryanne";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
