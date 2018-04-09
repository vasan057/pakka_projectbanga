<?php

use Illuminate\Database\Seeder;
use App\Model\RoleMapping;
class RoleMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleMapping::insert([
            ['role_id' => '1','menu' => 'Role Manager','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Mandi User Mapping','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'User Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Agmark Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Locations Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Mandi Destination Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'FOR Line Items','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'FOR Freight','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Destination Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'States Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Roles Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Mandi Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1'],
            ['role_id' => '1','menu' => 'Competitors Master','device_type' => 'W','parent_menu' => NULL,'links' => NULL,'views' => NULL,'middleware' => NULL,'is_active' => '1']
        ]);
    }
}
