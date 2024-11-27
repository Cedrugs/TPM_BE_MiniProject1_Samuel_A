<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "CategoryName" => "Work",
        ]);
        Category::create([
            "CategoryName" => "Personal",
        ]);
        Category::create([
            "CategoryName" => "Health",
        ]);
        Category::create([
            "CategoryName" => "Education",
        ]);
        Category::create([
            "CategoryName" => "Fitness",
        ]);
        Category::create([
            "CategoryName" => "Shopping",
        ]);
        Category::create([
            "CategoryName" => "Finance",
        ]);
        Category::create([
            "CategoryName" => "Household",
        ]);
        Category::create([
            "CategoryName" => "Travel",
        ]);
        Category::create([
            "CategoryName" => "Hobbies",
        ]);
        Category::create([
            "CategoryName" => "Entertainment",
        ]);
        Category::create([
            "CategoryName" => "Family",
        ]);
        Category::create([
            "CategoryName" => "Career Development",
        ]);
        Category::create([
            "CategoryName" => "Social",
        ]);
        Category::create([
            "CategoryName" => "Volunteer",
        ]);
        Category::create([
            "CategoryName" => "Project Deadlines",
        ]);
        Category::create([
            "CategoryName" => "Goals",
        ]);
        Category::create([
            "CategoryName" => "Repairs/Maintenance",
        ]);
        Category::create([
            "CategoryName" => "Events",
        ]);
        Category::create([
            "CategoryName" => "Miscellaneous",
        ]);
    }
}
