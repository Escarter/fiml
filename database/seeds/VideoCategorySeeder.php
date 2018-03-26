<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\VideoCategory;

class VideoCategorySeeder extends Seeder
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
        	VideoCategory::create([
				'name'=>'Forex Trainings',
				'tag'=>'forex',
        		'description'=>'Training on basic forex techniques']);
        	VideoCategory::create([	
				'name'=>'Binary Trainings',
				'tag'=>'binary',
        		'description'=>'Training on basic binary techniques']);
        	VideoCategory::create([	
				'name'=>'FIML Training',
				'tag'=>'fiml',
        		'description'=>'Training on how to use the FIML robots and other tools and techniques']);
        	VideoCategory::create([	
				'name'=>'Affiliate & Marketing Trainings',
				'tag'=>'affiliate',
        		'description'=>'Training on basic Affiliates and Marketing techniques']);
        Model::reguard();
    }
}
