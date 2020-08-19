<?php

namespace App\Models;

use App\Interfaces\Drawable;

/**
 * holds all the letter patterns drawn to it 
 */
class Board 
{
	protected $direction;
	/** 2d array where the line patterns will be drawn */
	protected $arr = [];
	protected $row;
	protected $col;
	protected $startRow = 0;
	protected $startCol = 0;

	const HORIZONTAL = "horizontal";
	const VERTICAL = "vertical";

	public function __construct($lettersLen, $size, $direction)
	{
		$this->size = $size;
		$this->direction = $direction;

		if ($direction == self::HORIZONTAL) {
			$this->row = $size;
			$this->col = $size * $lettersLen + ($lettersLen - 1);
		} else {
			$this->row = $size * $lettersLen + ($lettersLen - 1);
			$this->col = $size;
		}

		$this->init();
	}

	/**
     * initializes all rows and cols of arr with spaces
     * for printing the whole arr
     */
	private function init()
	{
		for ($i = 0 ; $i < $this->row ; $i++) {
			for($j = 0 ; $j < $this->col ; $j++) {
				$this->arr[$i][$j] = " ";
			}
		}
	}

	/**
	 * typehints Drawable for polymorphism. With this, any pattern 
	 * can be drawn on the board by just creating a class for that pattern 
	 */
    public function add(Drawable $letter)
   	{
    	$this->arr = $letter->draw($this->arr, $this->startRow, $this->startCol);
    	
    	// adjust startRow or startCol (depending on the direction) for the 
    	// next starting point of the next letter to draw
    	if ($this->direction == self::HORIZONTAL) {
    		$this->startCol += $this->size + 1;
    	} else {
    		$this->startRow += $this->size + 1;
    	}
    }

    public function draw()
    {
    	$out = new \Symfony\Component\Console\Output\ConsoleOutput();

		for ($i = 0 ; $i < $this->row; $i++) {
			for ($j = 0; $j < $this->col; $j++) {
				$out->write($this->arr[$i][$j]);
			}
			$out->writeln("");
		}
		$out->writeln("");

		echo "Please check the output on the console.";
    }   
}
