<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoAddRequest;
use App\Http\Requests\TodoEditRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function show($id = null)
    {
        if ($id) {
            // Get all data
            $todo = Todo::find($id);
            $todo = [
                'data' => $todo
            ];
        } else {
            // Get all data
            $todo = Todo::paginate(10);
        }
        // Render response
        return response()->json($todo);
    }

    public function add(TodoAddRequest $request)
    {
        try {
            DB::beginTransaction();
            // Store data to database
            $todo = Todo::create($request->all());
            // Commit
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            // Error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to add todo !',
                'data' => $e->getMessage()
            ], 500);
        }
        // Success response
        return response()->json([
            'success' => true,
            'message' => 'Success to add todo',
            'data' => $todo->id
        ]);
    }

    public function update(TodoEditRequest $request)
    {
        // Check todos
        $todo = Todo::find($request->id);
        if (!$todo) {
            // Error response
            return response()->json([
                'success' => false,
                'message' => 'Todo target not found !',
                'data' => null
            ], 404);
        }

        try {
            DB::beginTransaction();
            // Store data to database
            $todo->update($request->except('id'));
            // Commit
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            // Error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update todo !',
                'data' => $e->getMessage()
            ], 500);
        }
        // Success response
        return response()->json([
            'success' => true,
            'message' => 'Success to update todo',
            'data' => $todo->id
        ]);
    }

    public function delete($id = null)
    {
        // Check todos
        $todo = Todo::find($id);
        if (!$todo) {
            // Error response
            return response()->json([
                'success' => false,
                'message' => 'Todo target not found !',
                'data' => null
            ], 404);
        }

        try {
            DB::beginTransaction();
            // Delete data from database
            $todo->delete();
            // Commit
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            // Error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete todo !',
                'data' => $e->getMessage()
            ], 500);
        }
        // Success response
        return response()->json([
            'success' => true,
            'message' => 'Success to delete todo',
            'data' => $id
        ]);
    }
}
