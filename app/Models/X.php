<?php

namespace App\Models;

use App\Interfaces\Drawable;
use App\Helpers\DrawHelper;

/**
 * Draw a letter X pattern on the given board 
 */
class X implements Drawable 
{
	protected $size;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function draw($board, $startRow, $startCol) 
	{
		$board = DrawHelper::diagonalLeftToRight($board, $startRow, $startCol, $this->size);
		$startCol += $this->size-1;
		$board = DrawHelper::diagonalRightToLeft($board, $startRow, $startCol, $this->size);
		return $board;
	}
}