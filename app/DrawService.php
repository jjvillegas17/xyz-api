<?php

namespace App;

class DrawService 
{
	public static function diagonalLeftToRight($board, $startRow, $startCol, $size)
	{
		var_dump([$startRow, $startCol]);
		for ($i = 0; $i < $size; $i++) {
			echo $startRow . " " . $startCol . "<br>";
			$board[$startRow++][$startCol++] = 'o';
		}	

		return $board;
	}

	public static function diagonalRightToLeft($board, $startRow, $startCol, $size)
	{	
		for ($i = 0; $i < $size; $i++) {
			echo $startRow . " " . $startCol . "<br>";
			$board[$startRow++][$startCol--] = 'o'; 
		}

		return $board;
	}
}