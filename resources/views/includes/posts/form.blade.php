@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" class="border rounded my-5 p-5 bg-white">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}" class="border rounded my-5 p-5 bg-white">
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
    <div class="input-group mt-3 mb-1 col-12">
        <div class="input-group-prepend">
            <label class="input-group-text" for="category_id">Category</label>
        </div>
        <select class="custom-select" id="category_id" name="category_id">
            <option>No category</option>
            @foreach ($categories as $category)
                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-text col-12">Insert the category of the comic you want to {{ $string }}.</div>
</div>
<fieldset>
    <h5>Tags</h5>

    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1-{{ $tag->id }}"
                @if (in_array($tag->id, old('tags', []))) checked @endif value="{{ $tag->id }}" name="$tags[]">{{-- Serve che tutti i name vengano raccolti sotto forma di array
                     perchè le checkbox devono avere il name in comune --}}
            <label class="form-check-label" for="inlineCheckbox1-{{ $tag->id }}">{{ $tag->name }}</label>
        </div>
    @endforeach

</fieldset>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
