<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Route::get('view-records','StudViewController@index');

        //  return $response;
           // ->assertStatus(200)
           /*  ->assertJson([
                'created' => true,
            ]); */
    }
}
