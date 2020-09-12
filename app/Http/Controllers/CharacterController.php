<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function showCharacters(Request $request){
        $character = Http::get("https://www.anapioficeandfire.com/api/characters?page={$request->page}&pageSize={$request->size}")->json();

        function age($born, $died){
            if(empty($died)){
                 return Carbon::now()->age;
            }
            return Carbon::parse($died)->year - Carbon::parse($born)->year;
        }

        if (!empty($request->gender)) {
            $sortedData = collect($character)->filter(function ($data, $key) use ($request) {

               return strcmp( strtolower($data['gender']), strtolower($request->gender));
            });
        }
        else if($request->dsc){
            if($request->name){
              $sortedData = collect($character)->sortByDesc(function ($data, $key) {
                    return $data['name'];
                });
            }
            else if($request->gender){
              $sortedData = collect($character)->sortByDesc(function ($data, $key) {
                    return $data['gender'];
                });
            }
            else if($request->age){
              $sortedData = collect($character)->sortByDesc(function ($data, $key) {
                   return age($data['born'], $data['died']);

                });
            }
        }
        else{
            if($request->name){
              $sortedData = collect($character)->sortBy(function ($data, $key) {
                    return $data['name'];
                });
            }
            else if($request->gender){
              $sortedData = collect($character)->sortBy(function ($data, $key) {
                    return $data['gender'];
                });
            }
            else if($request->age){
              $sortedData = collect($character)->sortBy(function ($data, $key) {
                    return age($data['born'], $data['died']);

                });
            }

        }

        $metaData = [
            "total_number_characters"=> $sortedData->count(),
            "total_age"=> $sortedData->map(function ($data){
                age($data['born'], $data['died']);
            })-> reduce(function ($carry, $item) {
                return $carry + $item;
            }),
        ];

        return response()->json([
            "status" => 200,
            "charaters" => $sortedData,
            "metaData" => $metaData,
        ]);

    }
}
