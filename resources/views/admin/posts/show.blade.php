@extends('layouts.app')
@section('content')
    <div class="mt-5 d-flex justify-content-center align-items-center ">
        <div class="card" style="width: 31rem;">
            <img class="card-img-top" src="{{ $post->image }}" alt="{{ $post->title }}-image">
            <div class="card-body">
                <h4 class="card-title font-weight-bold">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Go home</a>
            </div>
        </div>
    </div>
@endsection
