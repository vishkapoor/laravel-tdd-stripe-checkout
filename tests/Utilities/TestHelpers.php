<?php

function create($class, $attributes = [], $numberOfRecords = null) 
{
	return factory($class, $numberOfRecords)->create($attributes);
}

function make($class, $attributes = [], $numberOfRecords = null) 
{
	return factory($class, $numberOfRecords)->make($attributes);
}