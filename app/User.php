<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * get users flights
     *
     * @return QueryBuilder
     */
    public function flights()
    {
        return $this->belongsToMany('App\Flight');
    }

    /**
     * book flight
     *
     * @param Flight $flight
     * @return void
     */
    public function bookFlight(Flight $flight)
    {
        $this->flights()->save($flight);
    }

    /** 
     * book many flights
     * 
     * @return Void
    */
    public function bookManyFlights($flights)
    {
        $this->flights()->saveMany($flights);
    }

    /**
     * cancel flight
     *
     * @param Flight $flight
     * @return Void
     */
    public function cancelFlight(Flight $flight)
    {
        $this->flights()->detach($flight);
    }
}
