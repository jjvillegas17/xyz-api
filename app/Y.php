<?php

namespace App;

use App\Drawable;
use App\DrawService;

class Y implements Drawable 
{
	protected $size;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function draw($board, $startRow, $startCol) 
	{
		$len = (int) ($this->size/2+1);
		$board = DrawService::diagonalLeftToRight($board, $startRow, $startCol, $len);
		$board = DrawService::diagonalRightToLeft($board, $startRow, $startCol+$this->size-1, $len);
		$board = DrawService::vertical($board,$startRow+$len, $startCol+$len-1, $len-1);
		return $board;
	}
}