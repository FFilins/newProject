<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Categoria;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        

        Categoria::insert([
            [
                'name' => 'Acougue'
            ],

            [
                'name' => 'Limpeza'
            ],

            [
                'name' => 'Pet'
            ],
            
            [
                'name' => 'Congelados'
            ],

            [
                'name' => 'Bebidas'
            ],

            [
                'name' => 'Padaria'
            ],

        ]);
    }
}
