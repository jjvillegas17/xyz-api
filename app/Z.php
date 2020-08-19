<?php

namespace App;

use App\Drawable;
use App\DrawService;

class Z implements Drawable 
{
	protected $size;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function draw($board, $startRow, $startCol) 
	{
		$board = DrawService::horizontal($board, $startRow, $startCol, $this->size);
		$board = DrawService::diagonalRightToLeft($board, $startRow, $startCol+$this->size-1, $this->size);
		$board = DrawService::horizontal($board,$startRow+$this->size-1, $startCol, $this->size);
		return $board;
	}
}