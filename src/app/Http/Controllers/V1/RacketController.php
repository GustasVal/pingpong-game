<?php

namespace App\Http\Controllers\V1;

use App\Events\RacketUpdated;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => 'ok'
        ], 200);
    }

    //TODO: update racket coordinates
    public function update(Request $request)
    {
        $string = 'message';
        event(new RacketUpdated('message'));
        die('hello');
//        event(RacketUpdated());
    }

    public function show(Request $request, $id)
    {
        //
    }


}
