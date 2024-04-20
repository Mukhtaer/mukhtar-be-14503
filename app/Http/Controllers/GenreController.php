<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GenreController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'genre' => 'required|string',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Action',
                    'description' => 'Action films usually include high energy, big-budget physical stunts and chases, possibly with rescues, battles, fights, escapes, destructive crises (floods, explosions, natural disasters, fires, etc.), non-stop motion, spectacular rhythm and pacing, and adventurous, often two-dimensional good-guy heroes (or recently, heroines) battling bad guys - all designed for pure audience escapism.'
                ],
                [
                    'id' => 2,
                    'name' => 'Comedy',
                    'description' => 'Comedy is a genre of film that uses humor as a driving force. The aim of a comedy film is to illicit laughter from the audience through entertaining stories and characters. It is one of the oldest film genres and is still hugely popular today. Comedy can be categorized multiple ways. It can be based on narrative content, character types, or the activity of the characters.'
                ],
                [
                    'id' => 3,
                    'name' => 'Drama',
                    'description' => 'Drama is a genre that relies on the emotional and relational development of realistic characters. While Drama film relies heavily on this kind of development, dramatic themes play a large role in the plot as well. Often, these dramatic themes are taken from intense, real life issues. Whether heroes or heroines are facing a conflict from the outside or a conflict within themselves, Drama film aims to tell an honest story of human struggles.'
                ],
                [
                    'id' => 4,
                    'name' => 'Fantasy',
                    'description' => 'Fantasy films are films that belong to the fantasy genre with fantastic themes, usually magic, supernatural events, mythology, folklore, or exotic fantasy worlds. The genre is considered a form of speculative fiction alongside science fiction films and horror films, although the genres do overlap. Fantasy films often have an element of magic, myth, wonder, escapism, and the extraordinary.'
                ],
                [
                    'id' => 5,
                    'name' => 'Horror',
                    'description' => 'Horror films are designed to frighten and to invoke our hidden worst fears, often in a terrifying, shocking finale, while captivating and entertaining us at the same',
                ],
            ]
        ]);
    }
}
