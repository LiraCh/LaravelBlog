@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Publications</div>

                    <div class="card-body">
                        @foreach($publications as $publication)
                            <article>
                                <h4>
                                    <a href="/publications/{{ $publication->id }}">
                                        {{ $publication->title }}
                                    </a>
                                    by <em>{{ $publication->creator->name }}</em>
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
    </div>
@endsection
