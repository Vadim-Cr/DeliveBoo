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
        return [
                'activity_name'=> fake() -> randomElement(['Pizzeria', 'Gelateria', 'Ristorante', 'Trattoria']) . ' ' .  fake('it_IT') ->lastName(),
                'image_path'=> fake() -> imageUrl('https://unsplash.com/it/foto/rDEOVtE7vOs'),
                'address'=> fake('it_IT') -> streetAddress(),
                'vat'=> fake() -> regexify('IT[0-9]{11}'),
                'mobile_phone'=> '+39 3' . fake() -> regexify('[0-9]{9}')
        ];
    }
}
