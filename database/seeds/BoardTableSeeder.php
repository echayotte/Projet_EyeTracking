<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $boards = [
            ['board_id' => 1, 'board_image' => 'ct2.jpg', 'board_number' => 1, 'fk_comic_id' => 1, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 2, 'board_image' => 'ct3.jpg', 'board_number' => 2, 'fk_comic_id' => 1, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 3, 'board_image' => 'ct4.jpg', 'board_number' => 3, 'fk_comic_id' => 1, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 4, 'board_image' => 'ct5.jpg', 'board_number' => 4, 'fk_comic_id' => 1, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 5, 'board_image' => 'hb2.jpg', 'board_number' => 1, 'fk_comic_id' => 2, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 6, 'board_image' => 'hb3.jpg', 'board_number' => 2, 'fk_comic_id' => 2, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 7, 'board_image' => 'hb4.jpg', 'board_number' => 3, 'fk_comic_id' => 2, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 8, 'board_image' => 'hb5.jpg', 'board_number' => 4, 'fk_comic_id' => 2, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 9, 'board_image' => 'i3.jpg', 'board_number' => 1, 'fk_comic_id' => 3, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 10, 'board_image' => 'i4.jpg', 'board_number' => 2, 'fk_comic_id' => 3, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 11, 'board_image' => 'pc2.jpg', 'board_number' => 1, 'fk_comic_id' => 4, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 12, 'board_image' => 'pc3.jpg', 'board_number' => 2, 'fk_comic_id' => 4, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 13, 'board_image' => 'pc4.jpg', 'board_number' => 3, 'fk_comic_id' => 4, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 14, 'board_image' => 'pc5.jpg', 'board_number' => 4, 'fk_comic_id' => 4, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 15, 'board_image' => 'pc6.jpg', 'board_number' => 5, 'fk_comic_id' => 4, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 16, 'board_image' => 'z3.jpg', 'board_number' => 1, 'fk_comic_id' => 5, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 17, 'board_image' => 'z4.jpg', 'board_number' => 2, 'fk_comic_id' => 5, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 18, 'board_image' => 'z5.jpg', 'board_number' => 3, 'fk_comic_id' => 5, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['board_id' => 19, 'board_image' => 'z6.jpg', 'board_number' => 4, 'fk_comic_id' => 5, 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')]
        ];

        Board::insert($boards);

    }
}
