<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Http\Controllers\HelperController;

class TimeSlotController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'theater_name' => 'sometimes|required|string',
            'time_start' => 'sometimes|required|string',
            'time_end' => 'sometimes|required|string',
        ];

        // Validate the request
        $request->validate($rules);

        if (!$request->has('theater_name') && !$request->has('time_start') && !$request->has('time_end')) {
            return response()->json(['error' => 'Please provide the theater name, start time and end time'], 400);
        }


        $thater_name =   strtolower($request->input('theater_name'));
        $timeSlots = TimeSlot::where('theater_name', $request->input('theater_name'))
            ->where('start_time', '<=', $request->input('time_start'))
            ->where('end_time', '>=', $request->input('time_end'))
            ->with('movie')
            ->get();

        $formattedTimeSlots = $this->format($timeSlots);

        return response()->json(['data' => $formattedTimeSlots]);
    }


    public function specific_movie_theater(Request $request)
    {
        $rules = [
            'theater_name' => 'sometimes|required|string',
            'd_date' => 'sometimes|required|string',
        ];

        $request->validate($rules);

        if (!$request->has('theater_name') && !$request->has('d_date')) {
            return response()->json(['error' => 'Please provide the theater name and date'], 400);
        }

        $theater_name = strtolower($request->input('theater_name'));
        $d_date = $request->input('d_date');

        $timeSlots = TimeSlot::where('theater_name', $theater_name)
            ->whereDate('start_time', $d_date)
            ->orWhereDate('end_time', $d_date)
            ->with('movie')
            ->get();

        $formattedTimeSlots = $this->format($timeSlots);

        return response()->json(['data' => $formattedTimeSlots]);
    }


    function format($timeSlots)
    {
        $formattedData = [];

        foreach ($timeSlots as $timeSlot) {
            $genres = json_decode($timeSlot->movie->genres);
            $firstGenre = isset($genres[0]) ? $genres[0] : null;

            $formattedData[] = [
                "Movie_ID" => $timeSlot->movie->id,
                "Title" => $timeSlot->movie->title,
                "Duration" =>  HelperController::convertLengthToHours($timeSlot->movie->length),
                "Views" =>  HelperController::convertViewToKM($timeSlot->movie->views),
                "Genre" => $firstGenre,
                "Poster" => $timeSlot->movie->poster,
                "Overall_rating" => $timeSlot->movie->overall_rating,
                "Theater_name" => $timeSlot->theater_name,
                "Start_time" => $timeSlot->start_time,
                "End_time" => $timeSlot->end_time,
                "Description" => $timeSlot->movie->description,
                "Theater_room_no" => $timeSlot->theater_room_no
            ];
        }

        return $formattedData;
    }
}
