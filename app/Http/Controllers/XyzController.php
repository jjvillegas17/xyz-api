<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Factories\LetterFactory;

class XyzController extends Controller
{
    public function index(Request $request)
    {
        // input validation
        $this->validate($request, [
            'letters' => ['required', "regex:/^[xXyYzZ]{1,}$/"],
            'size' => ['required', 'numeric', 'gte:3', 'regex:/^\d*[13579]$/'],
            'direction' => ['required', 'in:horizontal,vertical'],
        ]);

        // get the query parameters
        $letters = strtolower($request->input('letters'));
        $size = $request->input('size');
        $direction = strtolower($request->input('direction'));

        $stringLen = strlen($letters);

        $board = new Board($stringLen, $size, $direction);

        // iterate over the given string. add and insert the letter pattern to the board
        for ($i = 0 ; $i < $stringLen; $i++) { 
            $letter = LetterFactory::make($letters[$i], $size);
            $board->add($letter);
        }

        // print the board that holds the letter patterns
        $board->draw();
    }
}
