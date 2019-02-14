<?php

use Illuminate\Database\Seeder;
use App\Media;


class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $medias = [
            ['media_id' => 1, 'media_type' => 'son', 'media_filename' => 'plouf.mp3', 'media_path' => '/storage/medias/plouf.mp3', 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')],
            ['media_id' => 2, 'media_type' => 'son', 'media_filename' => 'writing.mp3', 'media_path' => '/storage/medias/writing.mp3', 'created_at' => date('Y-m-d H:i:s'),  'updated_at' => date('Y-m-d H:i:s')]
        ];

        Media::insert($medias);

    }
}
