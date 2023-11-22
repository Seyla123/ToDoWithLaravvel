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
                        <a href="{{ url()->previous() }}" class="btn btn-success">Go Back</a><br>
                        <b>Your Todo List title is : </b>{{ $todo->Title }}<br>
                        <b>Your Todo List Description is : </b> {{ $todo->Description }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
