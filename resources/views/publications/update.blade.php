@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update the Publication</div>

                    <div class="card-body">
                        <form method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Title">Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ $publication->title }}">
                            </div>

                            <div class="form-group">
                                <label for="Content">Content:</label>
                                <textarea name="content" id="content" class="form-control">{{ $publication->content }}</textarea>
                            </div>

                            <button type="submit" class="btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
