<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' =>$this->faker->randomElement(['1', '2', '3']),
            'email' => $this->faker->safeEmail(),
            'tel_1' => $this->faker->randomNumber(3, true),
            'tel_2' => $this->faker->randomNumber(4,true),
            'tel_3' =>$this->faker->randomNumber(4, true),
            'address' => $this->faker->address(),
            'building' => $this->faker->secondaryAddress(),
            'category_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'detail' => $this->faker->realText(120)
        ];
    }
}
