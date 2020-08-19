<?php

namespace App\Models;

use App\Interfaces\Drawable;
use App\Helpers\DrawHelper;

class Z implements Drawable 
{
	protected $size;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function draw($board, $startRow, $startCol) 
	{
		$board = DrawHelper::horizontal($board, $startRow, $startCol, $this->size);
		$board = DrawHelper::diagonalRightToLeft($board, $startRow, $startCol+$this->size-1, $this->size);
		$board = DrawHelper::horizontal($board,$startRow+$this->size-1, $startCol, $this->size);
		return $board;
	}
}