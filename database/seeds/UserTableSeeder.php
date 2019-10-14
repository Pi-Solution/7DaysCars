<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'adminadmin123'
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => 'useruser123'
            ]
        ];
        //
        foreach ($data as $user) {
            factory(App\User::class, 1)->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);
        }
    }
}
