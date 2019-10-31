<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FlightsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauth_user_can_not_get_flights()
    {
        //when unauthorized user gets flights
        $this->get('/api/flights');
        
        //expect 401 unauthorized response
        $this->assertResponseStatus(401);
    }

    /** @test */
    public function auth_user_can_get_flights()
    {
        //given that db has flights
        $flights = factory('App\Flight', 3)->create();

        //when auth user gets flights
        $this->actingAs($this->authUser())
            ->get('/api/flights');

        //expect json flights response
        $this->seeJson([
            'data' => $flights->toArray()
        ]);

        //and 200 status
        $this->assertResponseStatus(200);
    }
}
