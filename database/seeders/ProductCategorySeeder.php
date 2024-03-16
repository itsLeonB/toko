<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::insert([
            [
                'name' => 'Writing Instruments',
                'description' => 'Pens, pencils, markers, and other writing instruments.',
            ],
            [
                'name' => 'Paper Products',
                'description' => 'Notebooks, notepads, sticky notes, and other paper products.',
            ],
            [
                'name' => 'Office Supplies',
                'description' => 'Staplers, paper clips, rubber bands, and other office supplies.',
            ],
            [
                'name' => 'Desk Accessories',
                'description' => 'Desk organizers, file folders, and other desk accessories.',
            ],
        ]);
    }
}
