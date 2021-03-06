<?php

namespace Modules\Inventaire\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Inventaire\Entities\Place;
use Modules\Inventaire\Entities\Statut;
use Modules\Inventaire\Entities\Type;
use Modules\Inventaire\Entities\Utility;

class MaterielFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Inventaire\Entities\Materiel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //recuperer de la table ulility
        $utility = Utility::all()->random();

        //recuperer de la table statut
        $statut = Statut::all()->random();

        //recuperer de la table type
        $type = Type::all()->random();

        //recuperer de la table place
        $place = Place::all()->random();

        return [
            'nom' => $this->faker->name,
            'numero_serie' => $this->faker->unique()->randomNumber(9),
            'token' => $this->faker->unique()->numberBetween($min=100000 , $max=999999),
            'utility_id' =>  $utility->id,
            'statut_id' => $statut->id,
            'type_id' => $type->id,
            'place_id' => $place->id,
        ];
    }
}
