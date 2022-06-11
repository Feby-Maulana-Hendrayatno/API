<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\DeskripsiRumah;

class DeskripsiRumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeskripsiRumah::create([
            "id" => "1",
            "foto" => "image/GwlBrKI9cxIuSV1XyamQC6twcbXbYQoR02YQEtGr.jpg",
			"type" => "45",
            "harga" =>50000000,
            "stock" =>40,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
            "id_user" =>2,
		]);

        DeskripsiRumah::create([
            "id" => "2",
			"type" => "35",
            "foto" => "image/scE8Sm49xT7a8eX0dvZ4AD7YlM6gxueZ90mvDh5Y.jpg",
            "harga" =>75000000,
            "stock" =>40,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
		]);
    }
}
