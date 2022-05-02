<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\ProductController;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first() ?? User::factory()->create();
        $attributes = [];
        $categories = [];
        for ($i = 0; $i < 3; $i++) {
            $new = Attribute::factory()->create();
            $attributes[] = $new;
            $options = [];
            for ($j = 0; $j < 3; $j++) {
                $newOption = Option::factory()->create();
                $options[] = $newOption;
            }
            $new->options()->sync(collect($options)->pluck('id'));
            $category = Category::factory()->create();
            $categories[] = $category;
        }

        for ($i = 0; $i < 10; $i++) {
            $product = Product::factory()->create([
                'user_id' => $user->id,
                'category_id' => collect($categories)->pluck('id')->random(),
            ]);
            $image = Image::factory()->make();
            $product->attributes()->sync(collect($attributes)->pluck('id'));
            $product->images()->create([
                'location' => $image->location
            ]);
        }
    }
}
