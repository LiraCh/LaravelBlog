@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $publication->title }}</div>

                    <div class="card-body">
                        {{ $publication->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
