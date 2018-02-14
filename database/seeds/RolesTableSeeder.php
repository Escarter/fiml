<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Users of the system
        	Role::create([
        		'name'=>'user',
        		'label'=>'Basic user or affiliate']);
        	Role::create([	
        		'name'=>'admin',
        		'label'=>'Responsible for managing the system']);
        Model::reguard();
    }
}
