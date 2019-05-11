@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ $profileUser->name }}
                            <i><small>{{ $profileUser->created_at->diffForHumans() }}</small></i>
                        </h1>
                    </div>
                    <div class="card-body">
                        @foreach($publications as $publication)
                            <article>
                                <h4>
                                    <a href="/publications/{{ $publication->id }}">{{ $publication->title }}</a> created
                                    at: {{ $publication->created_at->diffForHumans() }}

                                    <a href="/publications/update/{{ $publication->id }}">
                                        <button type="submit" class="btn">Update</button>
                                    </a>
                                    <a href="/publications/delete/{{ $publication->id }}">
                                        <button type="submit" class="btn">Delete</button>
                                    </a>
                                </h4>
                                <div class="body">{{ $publication->content }}</div>
                            </article>

                            <hr>
                        @endforeach

                    {{ $publications->links() }}


                </div>
            </div>
        </div>
    </div>

@endsection