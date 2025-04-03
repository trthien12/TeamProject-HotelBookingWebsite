<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function test_example()
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
