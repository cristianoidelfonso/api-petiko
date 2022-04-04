<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'nome' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'preco' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 9, $max = 999), // 48.8932
            'descricao' => $this->faker->paragraph($nbSentences = 2, $variableNbSentences = true),
            'url' => 'produtos/'. $this->faker->image('public/storage/produtos', 640,480, null, false),
        ];
    }
}
