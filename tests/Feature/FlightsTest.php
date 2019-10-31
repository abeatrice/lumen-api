<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FlightsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauth_user_can_not_get_flights()
    {
        //unauthorized user get flights request
        $this->get('/api/flights');
        
        //expect 401 unauthorized response
        $this->assertEquals(401, $this->response->status());
    }

    /** @test */
    public function auth_user_can_get_flights()
    {
        //given that db has flights
        $flights = factory('App\Flight', 3)->create();

        //auth user get flights request
        $this->actingAs($this->authUser())
            ->get('/api/flights');

        //expect json flights response
    }
}
