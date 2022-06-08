<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutorizacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'USUARIO_ID' => Usuario::factory()->create(),
            'CHAVE_AUTORIZACAO' => 'cadastrar_clientes',         
        ];
    }
}
