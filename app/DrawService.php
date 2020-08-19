<?php

namespace App;

class DrawService 
{
	public static function diagonalLeftToRight($board, $startRow, $startCol, $size)
	{
		for ($i = 0; $i < $size; $i++) {
			$board[$startRow++][$startCol++] = 'o';
		}	

		return $board;
	}

	public static function diagonalRightToLeft($board, $startRow, $startCol, $size)
	{	
		for ($i = 0; $i < $size; $i++) {
			$board[$startRow++][$startCol--] = 'o'; 
		}

		return $board;
	}

	public static function vertical($board, $startRow, $startCol, $size)
	{
		for ($i = 0; $i < $size; $i++) {
			$board[$startRow++][$startCol] = 'o'; 
		}

		return $board;
	}

	public static function horizontal($board, $startRow, $startCol, $size)
	{
		for ($i = 0; $i < $size; $i++) {
			$board[$startRow][$startCol++] = 'o'; 
		}

		return $board;
	}	
}