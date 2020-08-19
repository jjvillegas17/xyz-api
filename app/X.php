<?php

namespace App;

use App\Drawable;
use App\DrawService;

class X implements Drawable 
{
	protected $size;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function draw($board, $startRow, $startCol, $direction) 
	{
		$board = DrawService::diagonalLeftToRight($board, $startRow, $startCol, $this->size);
		$startCol += $this->size-1;
		$board = DrawService::diagonalRightToLeft($board, $startRow, $startCol, $this->size);
		return $board;
	}
}