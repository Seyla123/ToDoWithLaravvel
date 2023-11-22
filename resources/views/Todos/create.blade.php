@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todo App') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <a href="{{ url()->previous() }}" class="btn btn-success">Go Back</a><br>
                        <form method="POST" action="{{ route('todos.store') }}">
                            @csrf
                            <div class="m-3">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="m-3">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="description"></textarea>
                                </div>
                            </div>
                            <div class="m-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
