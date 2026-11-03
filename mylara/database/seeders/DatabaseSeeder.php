<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
       
        // Category::factory(20)->create();

        // Role::factory(20)->createmany(
        //     [
        //       ['name' => 'admin'],
        //       ['name' => 'Sales Person'],
        //       ['name' => 'Editor'],
        //       ['name' => 'Vendor'],

        //     ]
        // );
        // Category::factory(5)->createmany([
        //   ['name' => 'Cloths'],
        //       ['name' => 'Watches'],
        //       ['name' => 'Glasses'],
        //       ['name' => 'Shoes'],
        // ]);
        //  Brand::factory(20)->create();
         Product::factory(30)->create();
    }
}
