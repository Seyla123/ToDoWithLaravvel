@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todo App') }}</div>

                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="btn btn-success">Go Back</a><br>
                        <h4 class="m-3">Edit Form</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('todos.update')}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="todo_id" value="{{$todo->id}}">
                            <div class="m-3">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$todo->Title}}">
                                </div>
                            </div>
                            <div class="m-3">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="description" >{{$todo->Description}}</textarea>
                                </div>
                            </div>
                            <div class="m-3">
                                <label for="">Status</label>
                                <select name="is_completed"  id="" class="form-control">
                                    @if ($todo->Is_Completed == 0)
                                    <option value="0" selected>Incompleted </option>
                                    <option value="1" >Completed</option>
                                    @else
                                    <option value="1" selected>Completed</option>
                                    <option value="0" >Incompleted </option>
                                    @endif
                                </select>
                            </div>
                            <div class="m-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
