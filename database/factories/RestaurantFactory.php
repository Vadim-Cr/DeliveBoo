<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $photoLink = [
            "https://www.081pizzeria.it/app/uploads/081-pizzeria-interno-1-scaled.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXwKhCfSi7gmkdoH3CiNmKOrehOIwDGFCj2tEtYLQWEA&s",
            "https://www.ristorantedarosa.com/files/.thumbs/home/slider-2022/2000x/da-rosa-ristorante-como-location.jpg"
        ];

        return [
            'activity_name'=> fake() -> randomElement(['Pizzeria', 'Gelateria', 'Ristorante', 'Trattoria']) . ' ' .  fake('it_IT') ->lastName(),
            'image_path'=> fake() -> randomElement($photoLink),
            'address'=> fake('it_IT') -> streetAddress(),
            'vat'=> fake() -> regexify('IT[0-9]{11}'),
            'mobile_phone'=> '+39 3' . fake() -> regexify('[0-9]{9}')
        ];
    }
}
