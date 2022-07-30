<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('fr_FR');
        return [
            'nom_objet' =>$this->faker->word(rand(5, 10), true),
            'description' =>$this->faker->sentences(5, true),
            'dco'=>$this->faker->year($max = 'now'),
            // 'image' => 'public/post/0QexhGyzYOjRoPDpHLUpPq5ocLoQQbxt7adIRxcH.jpg'
            // 'image' => $this->faker->randomElement(["https://unsplash.com/photos/p0j-mE6mGo4","https://unsplash.com/photos/beYOfeTV5Zo",  "https://unsplash.com/photos/UBhpOIHnazM"]),
            'image' => $this->faker->randomElement(["k7.jpg","vinyl.jpg",  "https://unsplash.com/photos/UBhpOIHnazM"]),
        ];
    }
}
