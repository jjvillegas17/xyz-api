<?php

namespace App\Models;

use App\Interfaces\Drawable;
use App\Helpers\DrawHelper;

/**
 * Draw a letter Y pattern on the given board 
 */
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
		$board = DrawHelper::diagonalLeftToRight($board, $startRow, $startCol, $len);
		$board = DrawHelper::diagonalRightToLeft($board, $startRow, $startCol+$this->size-1, $len);
		$board = DrawHelper::vertical($board,$startRow+$len, $startCol+$len-1, $len-1);
		return $board;
	}
}