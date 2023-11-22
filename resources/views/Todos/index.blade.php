@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todo List') }}</div>

                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif
                        @if (Session::has('alert-info'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('alert-info') }}
                            </div>
                        @endif
                        <a class="btn btn-info" href="/Todos/create">Create Todo List</a>
                        <table class="table">
                            <caption>List of what I have to do. ( DO IT NOW!!! )</caption>
                            @if (count($todos) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="text-align: center;">Completed</th>
                                        <th scope="col" style="text-align: center;">Create By</th>
                                        <th scope="col" style="text-align: center;">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $t = 1;?>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td>{{ $t++ }}</td>
                                            <td>{{ $todo->Title }}</td>
                                            <td>{{ $todo->Description }}</td>
                                            <td style="text-align: center;">
                                                @if ($todo->Is_Completed == 1)
                                                    <a class="btn btn-success" href="{{route('todos.completed', $todo->id)}}" >completed</a>
                                                @else
                                                <a class="btn btn-danger" href="{{route('todos.completed', $todo->id)}}">Incomplete</a>
                                                @endif

                                            </td>
                                            <td>{{$todo->user->name}}</td>
                                            <td>
                                                <div style="text-align: center;">

                                                    <a class="btn btn-info" style="display:inline-block;" href="{{ route('todos.show', $todo->id) }}">View</a>
                                                    <a class="btn btn-primary" style="display:inline-block;" href="{{ route('todos.edit', $todo->id)}}">Edit</a>
                                                    <form method="POST" action="{{route('todos.destroy')}}" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                        <input class="btn btn-danger" type="submit" value="Delete">
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    @else
                        <h4>I have nothing to do </h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
