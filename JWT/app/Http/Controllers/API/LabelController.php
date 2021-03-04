<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LabelResource;
use Illuminate\Support\Facades\Validator;

use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Labels = Label::all();
        return response(['Labels' => LabelResource::collection($Labels), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $Label = Label::create($data);

        return response(['Label' => new LabelResource($Label), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $Label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $Label)
    {
        return response(['Label' => new LabelResource($Label), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $Label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $Label)
    {
        $Label->update($request->all());

        return response(['Label' => new LabelResource($Label), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $Label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $Label)
    {
        $Label->delete();

        return response(['message' => 'Deleted']);
    }
}
