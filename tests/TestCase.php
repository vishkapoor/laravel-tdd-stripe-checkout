<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    public function setUp() : void
    {
    	parent::setUp();

    	$this->user = create(User::class);

    	$this->signIn($this->user);

    }

    protected function signIn($user)
    {
    	$this->actingAs($user);
    	return $this;
    }

    protected function signOut()
    {
    	$this->post('/logout');
    	return $this;
    }

    protected function create($class, $attributes = [], $numberOfRecords = null)
    {
    	return create(
    		$class, 
    		array_merge($attributes, [ 'user_id' => $this->user->id ]),
    		$numberOfRecords
    	);
    }

    protected function make($class, $attributes = [], $numberOfRecords = null)
    {
    	return make(
    		$class, 
    		array_merge($attributes, [ 'user_id' => $this->user->id ]),
    		$numberOfRecords
    	);
    }

}
