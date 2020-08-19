<?php 

namespace App;

/*
 * must be implemented whenever an object (letter, pattern) 
 * is to be drawn on App\Board
 */
interface Drawable 
{
	// returns the board with the letter/pattern drawn on it 
	public function draw($board, $startRow, $startCol, $size);
}