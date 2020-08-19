<?php

namespace App;

use App\X;
use App\Y;
use App\Z;

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
