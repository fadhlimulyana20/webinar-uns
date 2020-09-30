<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $superUserRole = Role::where('name','superUser')->first();
        $adminRole = Role::where('name','admin')->first();
        $pendaftarRole = Role::where('name','pendaftar')->first();

        $superUser = User::create([
            'nama' => 'Super User',
            'email' => 'superuser@example.com',
            'password' => Hash::make('password'),
            'alamat' => 'indonesia',
            'tgl_lahir' => '2000-10-10'
        ]);

        $admin = User::create([
            'nama' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'alamat' => 'indonesia',
            'tgl_lahir' => '2000-10-10'
        ]);

        $pendaftar = User::create([
            'nama' => 'User pendaftar',
            'email' => 'pendaftar@example.com',
            'password' => Hash::make('password'),
            'alamat' => 'indonesia',
            'tgl_lahir' => '2000-10-10'
        ]);

        $superUser->roles()->attach($superUserRole);
        $admin->roles()->attach($adminRole);
        $pendaftar->roles()->attach($pendaftarRole);
    }
}
