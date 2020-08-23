<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
  	public function run()
  	{
        Category::create(['name' => 'Vegetables',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'vegetables',
            'code' => 'VG',
        ]);

        Category::create(['name' => 'Gulay Baguio',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'gulay-baguio',
            'code' => 'VB',
        ]);

        Category::create(['name' => 'Gulay Tagalog',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'gulay-tagalog',
            'code' => 'VT',
        ]);

        Category::create(['name' => 'Fruits',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'fruits',
            'code' => 'FR',
        ]);

        Category::create(['name' => 'Seafoods',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'seafoods',
            'code' => 'SF',
        ]);

        Category::create(['name' => 'Fresh Fish & Shell Fish',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'fresh-fish-shell-fish',
            'code' => 'FF',
        ]);

        Category::create(['name' => 'Dried Fish',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'dries-fish',
            'code' => 'DF',
        ]);

        Category::create(['name' => 'Meats',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'meats',
            'code' => 'MT',
        ]);

        Category::create(['name' => 'Chicken',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'chicken',
            'code' => 'CH',
        ]);

        Category::create(['name' => 'Beef',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'beef',
            'code' => 'BF',
        ]);

        Category::create(['name' => 'Carabao',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'carabao',
            'code' => 'CB',
        ]);

        Category::create(['name' => 'Goat',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'goat',
            'code' => 'GT',
        ]);

        Category::create(['name' => 'Pork',
            'isDisplayed' => 1,
            'parent' => '',
            'slug' => 'pork',
            'code' => 'PK',
        ]);

    }
}
