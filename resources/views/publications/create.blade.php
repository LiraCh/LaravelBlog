@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Publication</div>

                    <div class="card-body">
                        <form method="POST" action="/publications/create">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Title">Title:</label>
                                <input type="text" class="form-control" id="title"
                                       placeholder="title" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="Content">Content:</label>
                                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn">Publish</button>
                            </div>
                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
