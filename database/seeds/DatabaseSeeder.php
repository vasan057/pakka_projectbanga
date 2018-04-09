<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrderSequenceSeeder::class);
        $this->call(RoleMappingSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersBasicSeeder::class);
    }
}
