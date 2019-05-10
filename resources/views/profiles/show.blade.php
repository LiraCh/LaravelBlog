@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $profileUser->name }}
                <small>{{ $profileUser->created_at->diffForHumans() }}</small>
            </h1>
        </div>

        @foreach($publications as $publication)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                       <span class="flex">
                            <a href="#">{{ $publication->creator->name }}</a> posted:
                           <b> {{ $publication->title }} </b>
                       </span>

                        <span>{{ $publication->created_at->diffForHumans() }}</span>
                        <a href ="/publications/update/{{ $publication->id }}"><button type="submit" class="btn">Update</button></a>
                        <a href ="/publications/delete/{{ $publication->id }}"><button type="submit" class="btn">Delete</button></a>

                    </div>
                </div>

                <div class="panel-body">
                    {{ $publication->content }}
                </div>
            </div>
    @endforeach

    {{ $publications->links() }}


    </div>

    @endsection