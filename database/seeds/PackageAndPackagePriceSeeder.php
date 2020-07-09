<?php

use Illuminate\Database\Seeder;
use App\Package;
use App\PackagePrice;
use Carbon\Carbon;

class PackageAndPackagePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	PackagePrice::insert([
			[
				'id' => 1,
				'actual_price' => 19900,
				'discount_price' => 14900,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'id' => 2,
				'actual_price' => 46900,
				'discount_price' => 23450,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'id' => 3,
				'actual_price' => 58900,
				'discount_price' => 38900,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'id' => 4,
				'actual_price' => 109900,
				'discount_price' => 65900,
				'created_at' => Carbon::now()->toDateTimeString()
			]
		]);

    	Package::insert([
    		[
				'name' => 'Bayi',
				'package_price_id' => 1,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Pelajar',
				'package_price_id' => 2,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Personal',
				'package_price_id' => 3,
				'created_at' => Carbon::now()->toDateTimeString()
			],
			[
				'name' => 'Bisnis',
				'package_price_id' => 4,
				'created_at' => Carbon::now()->toDateTimeString()
			]
		]);
    }
}
