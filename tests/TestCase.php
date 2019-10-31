<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    /** 
     * Create authorized user
     * 
     * @return User
     */
    public function authUser()
    {
        return factory('App\User')->make();
    }
}
