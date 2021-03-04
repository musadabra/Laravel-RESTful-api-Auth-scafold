<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tasks = Task::all();
        return response(['Tasks' => TaskResource::collection($Tasks), 'message' => 'Retrieved successfully'], 200);
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
            'dueDate' => 'nullable|date',
            'comment' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $Task = Task::create($data);

        return response(['Task' => new TaskResource($Task), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $Task)
    {
        return response(['Task' => new TaskResource($Task), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $Task)
    {
        $Task->update($request->all());

        return response(['Task' => new TaskResource($Task), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $Task)
    {
        $Task->delete();

        return response(['message' => 'Deleted']);
    }
}
