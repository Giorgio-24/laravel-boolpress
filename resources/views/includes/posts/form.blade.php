@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}"
        class="border border-3 rounded my-5 p-5 bg-white">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}"
            class="border border-3 rounded my-5 p-5 bg-white">
@endif

@csrf
<div class="row">

    <h3 class="text-center mb-5 h1"><span class="text-capitalize">{{ $string }}</span> your post</h3>

    <div class="col-12">
        <label for="title" class="form-label"><strong>Title</strong></label>
        <input type="text" value="{{ old('title', $post->title) }}"
            class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="Insert title here">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <div class="form-text">Insert the title of the post you want to {{ $string }}.</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="content" class="form-label"><strong>Content</strong></label>
        <input type="text" value="{{ old('content', $post->content) }}"
            class="form-control @error('content') is-invalid @enderror" id="content" name="content"
            placeholder="Insert content here">
        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <div class="form-text">Insert the content of the comic you want to {{ $string }}.</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="image" class="form-label"><strong>Image</strong></label>
        <input type="text" value="{{ old('image', $post->image) }}"
            class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            placeholder="Insert image here">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <div class="form-text">Insert the image of the comic you want to {{ $string }}.</div>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
