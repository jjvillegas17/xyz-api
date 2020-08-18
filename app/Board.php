<?php

namespace App;

class Board 
{
	protected $direction;
	protected $arr = [];
	protected $row;
	protected $col;

	const HORIZONTAL = "horizontal";
	const VERTICAL = "vertical";

	public function __construct($lettersLen, $size, $direction)
	{
		$this->size = $size;
		$this->direction = $direction;

		if ($direction == HORIZONTAL) {
			$this->row = $size;
			$this->col = $size * $lettersLen;
		} else {
			$this->row = $size * $lettersLen;
			$this->col = $size;
		}
	}

    public function add($letter)
    {
    	$letter->draw($this->arr);
    }

    public function draw()
    {
		for ($i = 0 ; $i < $row; $i++) {
			for ($j = 0; $j < $col; $j++) {
				echo $letters[$i][$j];
			}
		}
    }   
}
