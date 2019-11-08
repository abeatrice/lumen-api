<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FlightsTest extends TestCase
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
    
    /** @test */
    public function user_can_book_a_flight()
    {
        $user = $this->signIn();

        $this->post("/api/user/{$user->id}/flights", [
            "flight_id" => $this->flights[0]->id
        ])->assertResponseStatus(201);

        $this->seeJson(['created' => true]);
    }
    
    /** @test */
    public function user_can_get_booked_flights()
    {
        $user = $this->signIn();

        $user->bookMany($flights = $this->flights->slice(2));

        $this->get("api/user/{$user->id}/flights")->assertResponseStatus(200);

        foreach ($flights as $flight) {
            $this->seeJson($flight->toArray());
        }
    }

    /** @test */
    public function user_cannot_get_another_users_flights()
    {
        $james = $this->signIn();
        
        $james->bookMany($flights = $this->flights->slice(2));
        
        $john = factory('App\User')->create(); 
        
        $this->actingAs($john)->get("api/user/{$james->id}/flights");

        $this->assertResponseStatus(401);
    }
    
    //auth user cannot create flight for other user

}
