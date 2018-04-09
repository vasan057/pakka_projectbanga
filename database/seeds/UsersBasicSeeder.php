<?php

use Illuminate\Database\Seeder;
use App\Model\UsersBasic;
class UsersBasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersBasic::insert([
            'user_id' => 'bgopsen',
            'password' => bcrypt('password'),
            'mobile_1' => '9900633600',
            'address_1' => 'bangalore',
            'pincode' => '560075',
            'roles_id' => '1',
            'email_1' => 'basawareddy@gmail.com',
            'active' => '1'
        ]);
    }
}
