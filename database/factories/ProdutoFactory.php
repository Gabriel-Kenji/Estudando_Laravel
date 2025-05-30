<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categoria;
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
    public function definition(): array
    {
        $nome = $this->faker->unique()->word();
        $color = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        return [
            "nome"=> $nome,
            "descricao"=> $this->faker->paragraph(),
            "preco"=> $this->faker->randomNumber(2),
            "slug"=> Str::slug($nome),
            // "imagem"=> $this->faker->imageUrl(400,400),
            "imagem" => "https://placehold.co/400x400/".$color."/000?text=" . $nome,
            "id_user" => User::pluck('id')->random(),
            "id_categoria" => Categoria::pluck("id")->random(),
        ];
    }
}
