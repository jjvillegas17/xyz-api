<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\LetterFactory;

class XyzController extends Controller
{
    public function index($letters, $size, $direction)
    {
        $stringLen = strlen($letters);

        $board = new Board($stringLen, $size, $direction);

        for ($i = 0 ; $i < $stringLen; $i++) { 
            $letter = LetterFactory::make($letters[$i]);
            $board->add($letter);
        }

        $board->draw();
    }
}
