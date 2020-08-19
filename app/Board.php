<?php

namespace App;

class Board 
{
	protected $direction;
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

		echo "<pre>";
		var_dump($this->arr);
		echo "</pre>";
		
		for ($i = 0 ; $i < $this->row; $i++) {
			for ($j = 0; $j < $this->col; $j++) {
				echo $this->arr[$i][$j] . " ";
			}
			echo "<br>";
		}
    }   
}
