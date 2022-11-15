<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function store(Request $req)
    {
        $words = Word::all();
        if ($words->count() > 40) {
            return response()->json([
                'status' => 200,
                'data' => $words
            ]);
        }
        $first = $req->first;
        $second = $req->second;
        $first_error = false;
        $second_error = false;
        foreach ($words as $word) {

            if (mb_strtolower($word->word) == mb_strtolower($first) && $first != '') {
                $first_error = true;
            }
            if (mb_strtolower($word->word) == mb_strtolower($second) && $second != '') {
                $second_error = true;
            }
        }

        if (!$first_error && $req->first != null) {
            Word::create([
                'word' => $req->first
            ]);
        }
        if (!$second_error && $req->second != null) {
            Word::create([
                'word' => $req->second
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => Word::all()
        ]);
    }

    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => Word::select('word')->get()
        ]);
    }
}
