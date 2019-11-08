<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FlightTest extends TestCase
{
    use DatabaseMigrations;

    protected $flights;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->flights = factory('App\Flight', 3)->create();
    }    

    /** @test */
    public function guest_can_not_get_flights()
    {
        $this->get('/api/flights')->assertResponseStatus(401);
    }

    /** @test */
    public function guest_can_not_get_single_flights()
    {
        $this->get('/api/flights/1')->assertResponseStatus(401);
    }

    /** @test */
    public function user_can_get_flights()
    {
        $this->signIn();

        $this->get('/api/flights')->assertResponseStatus(200);

        $this->seeJson([
            'data' => $this->flights->toArray()
        ]);
    }

    /** @test */
    public function user_can_get_a_single_flight()
    {
        $this->signIn();

        $this->get('/api/flights/1')->assertResponseStatus(200);

        $this->seeJson([
            'data' => $this->flights[0]->toArray()
        ]);
    }

}
