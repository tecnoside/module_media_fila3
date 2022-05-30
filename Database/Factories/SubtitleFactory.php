<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Media\Models\Subtitle;

class SubtitleFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modules\Media\Models\Subtitle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
       

        return [
            'id' => $this->faker->randomNumber,
            'media_id' => $this->faker->integer,
            'sentence_i' => $this->faker->randomNumber,
            'item_i' => $this->faker->randomNumber,
            'start' => $this->faker->randomFloat,
            'end' => $this->faker->randomFloat,
            'time' => $this->faker->time,
            'text' => $this->faker->text
        ];
    }
}
