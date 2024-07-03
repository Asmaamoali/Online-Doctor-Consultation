<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Symptom;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Medicine;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MedicineSymptom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0101010101',
            'image' => 'assets/img/default.jpg',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
        Category::factory()
            ->has(SubCategory::factory(5))
            ->count(10)
            ->create();
        Symptom::factory(10)->create();
        Medicine::factory(10)->create();
        MedicineSymptom::factory(10)->create();
        FAQ::factory(10)->create();
        Gallery::factory(10)->create();
        $doctors = User::where('role', 'doctor')
            ->get();
        foreach ($doctors as $doctor) {
            $category = Category::inRandomOrder()
                ->first();
            $subcategory = SubCategory::where('category_id', $category->id)
                ->inRandomOrder()
                ->first();
            $doctor->category_id = $category->id;
            $doctor->sub_category_id = $subcategory->id;
            $doctor->save();
        }
    }
}
