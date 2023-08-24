@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5">{{ $post->title }}</h1>
            </div>
            <div class="col-12">
                <img src={{ asset('storage/' . $post->image) }}></img>
            </div>
            <div class="col-12">
                <p>
                    {{ $post->content }}
                </p>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Ritorna alla lista completa</a>
            </div>
        </div>
    </div>
@endsection
