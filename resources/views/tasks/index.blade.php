@extends('layouts.app')

@section('content')
    <div class="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>fecha de vencimiento</th>
                    <th>Acciones </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <div class="d-flex align-items-center"> <!-- Flex container -->
                                <form method="POST" action="{{ route('deleteTask', $task) }}">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger me-2">Eliminar</button>
                                </form>
                                <a href="{{ route('editTask', $task->id) }}" class="btn btn-primary btn-edit">
                                    Editar
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No se encontraron tareas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $tasks->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
