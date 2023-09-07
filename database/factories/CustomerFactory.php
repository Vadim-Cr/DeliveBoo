<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name'=> fake('it_IT') -> name(),
                'last_name'=> fake('it_IT') ->lastName(),
                'address'=> fake('it_IT') -> streetAddress(),
                'email' => fake()->safeEmail(),
                'mobile_phone'=> '+39 3' . fake() -> regexify('[0-9]{9}')
        ];
    }
}
