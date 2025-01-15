<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'id' => 1,
                'restaurantName' => "Lawry's The Prime Rib Jakarta",
                'restaurantPhoneNumber' => "0812666666001",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Jalan Jendral Sudirman No. 33, Jakarta, Indonesia",
                'restaurantDescription' => "Lawry's The Prime Rib Jakarta offers a fine dining experience with signature prime rib served with traditional sides, complemented by an exquisite selection of wines.",
                'restaurantStyle' => "Fine Dining, Steakhouse",
                'restaurantImage' => "asset/imageRestaurant1.png"
            ],
            [
                'id' => 2,
                'restaurantName' => "Bubur Ayam Cikini",
                'restaurantPhoneNumber' => "081234567890",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Jl. Cikini Raya No. 10, Jakarta Pusat, Indonesia",
                'restaurantDescription' => "Bubur Ayam Cikini serves the most flavorful chicken porridge, a beloved street food in Jakarta, perfect for a quick and delicious meal.",
                'restaurantStyle' => "Casual Dining, Indonesian",
                'restaurantImage' => "asset/imageRestaurant2.png"
            ],
            [
                'id' => 3,
                'restaurantName' => "Nasi Goreng Kambing Kebon Sirih",
                'restaurantPhoneNumber' => "0812666666002",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Kebon Sirih, Jakarta, Indonesia",
                'restaurantDescription' => "A legendary spot for Nasi Goreng Kambing, this restaurant serves one of the best goat fried rice dishes in Jakarta, rich in spices and flavor.",
                'restaurantStyle' => "Casual Dining, Indonesian",
                'restaurantImage' => "asset/imageRestaurant3.avif"
            ],
            [
                'id' => 4,
                'restaurantName' => "Sushi Tei",
                'restaurantPhoneNumber' => "0812666666003",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Plaza Indonesia, Jakarta, Indonesia",
                'restaurantDescription' => "Sushi Tei offers fresh and authentic Japanese sushi, sashimi, and a wide variety of Japanese dishes with excellent service.",
                'restaurantStyle' => "Casual Dining, Japanese",
                'restaurantImage' => "asset/imageRestaurant4.jpg"
            ],
            [
                'id' => 5,
                'restaurantName' => "Cafe D'Liquid",
                'restaurantPhoneNumber' => "0812666666004",
                'restaurantCity' => "Bandung",
                'restaurantAddress' => "Jl. Dago No. 45, Bandung, Indonesia",
                'restaurantDescription' => "Cafe D'Liquid is known for its cozy atmosphere and great variety of coffees, teas, and light snacks, perfect for relaxation and small gatherings.",
                'restaurantStyle' => "Cafe, Coffee Shop",
                'restaurantImage' => "asset/imageRestaurant5.jpg"
            ],
            [
                'id' => 6,
                'restaurantName' => "Seafood 99",
                'restaurantPhoneNumber' => "0812666666005",
                'restaurantCity' => "Surabaya",
                'restaurantAddress' => "Jl. Raya Gubeng No. 88, Surabaya, Indonesia",
                'restaurantDescription' => "Seafood 99 serves fresh, high-quality seafood dishes with a variety of cooking styles, all prepared with the finest ingredients.",
                'restaurantStyle' => "Casual Dining, Seafood",
                'restaurantImage' => "asset/imageRestaurant6.webp"
            ],
            [
                'id' => 7,
                'restaurantName' => "The Grand Hyatt Jakarta",
                'restaurantPhoneNumber' => "0812666666006",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Jl. Thamrin No. 28, Jakarta, Indonesia",
                'restaurantDescription' => "The Grand Hyatt Jakarta offers a luxurious dining experience with a range of fine cuisine including Indonesian, Chinese, and International options.",
                'restaurantStyle' => "Fine Dining, International",
                'restaurantImage' => "asset/imageRestaurant1.png"
            ],
            [
                'id' => 8,
                'restaurantName' => "Kedai Kopi 89",
                'restaurantPhoneNumber' => "0812666666007",
                'restaurantCity' => "Yogyakarta",
                'restaurantAddress' => "Jl. Malioboro No. 89, Yogyakarta, Indonesia",
                'restaurantDescription' => "Kedai Kopi 89 is a popular coffee shop serving a variety of specialty coffees, homemade cakes, and savory snacks in a laid-back setting.",
                'restaurantStyle' => "Cafe, Coffee Shop",
                'restaurantImage' => "asset/imageRestaurant2.png"
            ],
            [
                'id' => 9,
                'restaurantName' => "Taman Santap Rumah Kayu",
                'restaurantPhoneNumber' => "0812666666008",
                'restaurantCity' => "Bali",
                'restaurantAddress' => "Jl. Raya Ubud, Bali, Indonesia",
                'restaurantDescription' => "Taman Santap Rumah Kayu offers a traditional Balinese dining experience, set in a beautiful garden with a range of authentic dishes.",
                'restaurantStyle' => "Fine Dining, Balinese",
                'restaurantImage' => "asset/imageRestaurant3.avif"
            ],
            [
                'id' => 10,
                'restaurantName' => "Pasta Viva",
                'restaurantPhoneNumber' => "0812666666009",
                'restaurantCity' => "Jakarta",
                'restaurantAddress' => "Jl. Senopati No. 18, Jakarta, Indonesia",
                'restaurantDescription' => "Pasta Viva serves freshly made pasta dishes, pizzas, and a selection of Italian wines, bringing the true taste of Italy to Jakarta.",
                'restaurantStyle' => "Italian, Casual Dining",
                'restaurantImage' => "asset/imageRestaurant4.jpg"
            ]
        ]);
        
    }
}
