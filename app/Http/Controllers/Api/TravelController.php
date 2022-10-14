<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Http\Response;

class TravelController extends Controller
{

    public function index()
    {
        $travels = Travel::all();
        return $travels;
    }

    public function store(Request $request)
    {
        $travel = new Travel();
        $travel->name = $request->name;
        $travel->description = $request->description;
        $travel->location = $request->location;
        $travel->attendees = $request->attendees;
        $travel->reference = $request->reference;

        $travel->save();
        return response()->json([
            'msg' => 'Travel saved successfully'
        ])
            ->setStatusCode(Response::HTTP_CREATED, Response::$statusTexts[Response::HTTP_CREATED]); //201
    }


    public function show($id)
    {
        $travel = Travel::find($id);
        return $travel;
        // response()->json([
        // 'travel' => $travel
        // ])
        // ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }


    public function update(Request $request, $id)
    {
        $travel = Travel::findOrFail($id);
        $travel->name = $request->name;
        $travel->description = $request->description;
        $travel->location = $request->location;
        $travel->attendees = $request->attendees;
        $travel->reference = $request->reference;

        $travel->save();
        return response()->json([
            'res' => true,
            'travel' => $travel,
            'msg' => 'Travel has been updated successfully'
        ])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]); //200
    }


    public function destroy($id)
    {
        $travel = Travel::destroy($id);
        return response()->json([
            'res' => true,
            'msg' => 'Travel has been deleted successfully'
        ])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    public function search(Request $request)
    {

        $query = Travel::query();

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->has('attendees')) {
            $query->where('attendees', 'LIKE', '%' . $request->attendees . '%');
        }
        $travel = $query->paginate(10);
        return response()->json([
            'res' => $travel
        ])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    //     ALTERNATIVE FILTER FUNCTION
    //
    //     public function search(Request $request){
    //         $search = $request ->get('q');
    //         $travel = Travel::where('name','Like','%'.$search.'%');

    //         if ($request->has('attendees')) {
    //             $travel->where('attendees', $request->attendees);

    //         return $travel->get(); }
    // }
}
