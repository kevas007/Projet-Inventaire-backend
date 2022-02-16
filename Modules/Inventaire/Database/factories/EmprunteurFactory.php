<?php
namespace Modules\Inventaire\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmprunteurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Inventaire\Entities\Emprunteur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->firstName(),
            'prenom'=>$this->faker->lastName(),
            'formation'=>$this->faker->jobTitle(),
            'adresse'=>$this->faker->address(),
            'date_naissance'=>$this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}

