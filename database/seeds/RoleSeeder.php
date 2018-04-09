<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'role' => 'Admin',
                'active' =>'1'
            ],
            [
                'role' => 'Pukka Arthiya',
                'active' =>'1'
            ],
            [
                'role' => 'Facilitator',
                'active' =>'1'
            ],
            [
                'role' => 'UBP',
                'active' =>'1'
            ],
        ]);
    }
}
