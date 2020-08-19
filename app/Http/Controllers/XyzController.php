<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Factories\LetterFactory;

class XyzController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'letters' => ['required', "regex:/^[xXyYzZ]{1,}$/"],
            'size' => ['required', 'numeric', 'gte:3', 'regex:/^\d*[13579]$/'],
            'direction' => ['required', 'in:horizontal,vertical'],
        ]);

        $letters = strtolower($request->input('letters'));
        $size = $request->input('size');
        $direction = strtolower($request->input('direction'));

        $stringLen = strlen($letters);

        $board = new Board($stringLen, $size, $direction);

        for ($i = 0 ; $i < $stringLen; $i++) { 
            $letter = LetterFactory::make($letters[$i], $size);
            $board->add($letter);
        }

        $board->draw();
    }
}
