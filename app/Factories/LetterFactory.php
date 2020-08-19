<?php

namespace App\Factories;

use App\Models\X;
use App\Models\Y;
use App\Models\Z;

/**
 * factory that returns instances of specified letter pattern
 */
class LetterFactory 
{
	public static $letters = [
		'x' => X::class,
		'y' => Y::class,
		'z' => Z::class
	]; 

	public static function make($letter, $size) 
	{
		return new self::$letters[$letter]($size);
	}   
}
