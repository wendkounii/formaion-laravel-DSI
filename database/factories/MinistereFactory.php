<?php

namespace Database\Factories;

use App\Models\Ministere;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinistereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ministere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'uuid'             =>$this->faker->uuid,
            'nom'      =>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'ministre'      =>$this->faker->company,
            'adresse'             =>$this->faker->buildingNumber ,
            'date_nomination'             =>$this->faker->dateTime($max = 'now', $timezone = null) ,
            'boite_postale'      =>$this->faker->postcode ,
            
        ];
    }
}
