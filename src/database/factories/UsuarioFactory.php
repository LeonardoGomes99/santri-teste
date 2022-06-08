<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'USUARIO_ID' => $this->faker->randomDigit(),
            'LOGIN' => $this->faker->userName(),   
            'SENHA' => $this->faker->password(),
            'ATIVO' => 'S', 
            'NOME_COMPLETO' => $this->faker->name(),            
        ];
    }
}
