<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'details' => 'required',
            // Add other validation rules for your fields
        ]);

        $task = Task::create($data);

        return redirect()->back()
                        ->with('success','User created successfully');
    }

    public function sync(Request $request)
    {
        // Process and synchronize data from the client
        $dataArr=$request->input('data');
        foreach ($dataArr as $key => $data) {
            $task = Task::create($data);
            // return response()->json([
            //     'data'=>$task,

            // ]);
        }



        return response()->json([
            'data'=>'success',

        ]);
        // You can set a flag indicating data is synchronized
    }
}
