<?php

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
        DB::table('products')->insert(
            [
                [   
                    'product_title' => 'Telefon',
                    'product_slug' => 'akilli-telefon-0',
                    'product_content' => 'Android işletim sistemi',
                    'product_price' => 1999.99,
                    'product_image' => 'https://cdn.akakce.com/xiaomi/xiaomi-mi-9-128-gb-z.jpg',
                    'product_status' => 1,
                    'product_author' => 0,
                    'product_comment_count' => 0
                ],
                [   
                    'product_title' => 'Telefon1',
                    'product_slug' => 'akilli-telefon-1',
                    'product_content' => 'Android işletim sistemi',
                    'product_price' => 1429.00,
                    'product_image' => 'https://cdn.akakce.com/xiaomi/xiaomi-mi-9-128-gb-z.jpg',
                    'product_status' => 1,
                    'product_author' => 0,
                    'product_comment_count' => 0
                ],
                [   
                    'product_title' => 'Telefon2',
                    'product_slug' => 'akilli-telefon-2',
                    'product_content' => 'Android işletim sistemi',
                    'product_price' => 1500.00,
                    'product_image' => 'https://cdn.akakce.com/xiaomi/xiaomi-mi-9-128-gb-z.jpg',
                    'product_status' => 1,
                    'product_author' => 0,
                    'product_comment_count' => 0
                ],
                [   
                    'product_title' => 'Telefon3',
                    'product_slug' => 'akilli-telefon-3',
                    'product_content' => 'Android işletim sistemi',
                    'product_price' => 2000.99,
                    'product_image' => 'https://cdn.akakce.com/xiaomi/xiaomi-mi-9-128-gb-z.jpg',
                    'product_status' => 1,
                    'product_author' => 0,
                    'product_comment_count' => 0
                ]
            ]
        );
    }
}
