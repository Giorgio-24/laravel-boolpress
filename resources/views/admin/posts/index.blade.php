@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration + ($posts->currentPage() - 1) * 10 }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mr-2">Go to
                                post</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn rounded bg-danger text-white" type="submit">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nessun post disponibile.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
