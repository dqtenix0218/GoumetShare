<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'caption' => 'テスト投稿1',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test1.png')),
            'address' => '東京都中央区日本橋本石町3-2-5マレ本石ビル2F',
            'place' => '肉友',
            'genre' => '肉',
        ];

        DB::table('posts')->insert($param);

        $param = [
            'caption' => 'テスト投稿2',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test2.png')),
            'address' => '東京都足立区千住1-23-18',
            'place' => 'キッチンフライパン',
            'genre' => 'かつ',
        ];

        DB::table('posts')->insert($param);

        $param = [
            'caption' => 'テスト投稿3',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test3.png')),
            'address' => '埼玉県さいたま市大宮区下町1-25',
            'place' => '狼煙',
            'genre' => 'ラーメン・つけ麺',
        ];

        DB::table('posts')->insert($param);

        $param = [
            'caption' => 'テスト投稿4',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test4.png')),
            'address' => '埼玉県さいたま市浦和区高砂1-8-11',
            'place' => '鶏そば一瑳',
            'genre' => 'ラーメン',
        ];

        DB::table('posts')->insert($param);

        $param = [
            'caption' => 'テスト投稿5',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test5.png')),
            'address' => '埼玉県さいたま市北区吉野町2-226-1',
            'place' => '海鮮亭　高はし',
            'genre' => '海鮮',
        ];

        DB::table('posts')->insert($param);

        $param = [
            'caption' => 'テスト投稿6',
            'user_id' => rand(1, 6),
            'created_at' => new DateTime(),
            'image' => base64_encode(file_get_contents('public/images/test6.png')),
            'address' => '東京都渋谷区道玄坂2-6-7 2F',
            'place' => 'pota pasta',
            'genre' => 'パスタ',
        ];

        DB::table('posts')->insert($param);
    }
}
