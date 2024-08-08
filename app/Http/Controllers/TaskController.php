<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $query = Task::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->due_date) {
            $query->where('due_date', $request->due_date);
        }
        $tasks = $query->get();

        if (count($tasks) == 0) return response()->json(["Message" => "No se han encontrado tareas."], 200);
        return response()->json(["Data" => $tasks], 200);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'title' => 'required|string',
                'description' => 'string',
                'status' => 'required|in:Pendiente,Iniciada,Terminada',
                'due_date' => 'date',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Errores de validación',
                    'errors' => $validator->errors()
                ]);
            }

            $task = Task::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Task creada exitosamente.',
                'data' => $task
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(["Error " => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return response()->json(['message' => 'Task no encontrada.'], 404);
        }

        return response()->json(["message" => "Task encontrada.", "Data" => $task], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'sometimes|required|string',
            'description' => 'string',
            'status' => 'sometimes|required|in:Pendiente,Iniciada,Terminada',
            'due_date' => 'date',
        ]);

        $task = Task::find($id);

        if (is_null($task)) {
            return response()->json(['message' => 'Task no encontrada.'], 404);
        }

        $task->update($request->all());

        return response()->json(["message" => "Task actualizada con exito.", "data" => $task], 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return response()->json(['message' => 'Task no encontrada.'], 404);
        }

        $task->delete();

        return response()->json(["message" => "Task eliminada correctamente"], 200);
    }
}
