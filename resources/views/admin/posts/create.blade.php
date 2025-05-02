@extends('admin.layouts.master')


@section('content')
    <!-- Posts -->
    <section id="posts">
        <h2 class="text-2xl font-semibold mb-4">Posts</h2>

        <!-- Post Form -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-xl font-semibold mb-4">Create Post</h3>
            <form action="{{ route('posts.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-gray-700">Title</label>
                    <input name="title" type="text" class="w-full p-2 border border-gray-300 rounded"
                        value="{{ old('title') }}">

                </div>
                <div>
                    <label class="block text-gray-700">Content</label>
                    <textarea name="content" class="w-full p-2 border border-gray-300 rounded" placeholder="Post Content" rows="5">{{ old('content') }}</textarea>

                </div>
                <div>
                    <label class="block text-gray-700">Category</label>
                    <select name="category_id" class="w-full p-2 border border-gray-300 rounded">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <br />
                    <img class="w-36 h-36" id="newImg"
                        src="https://www.svgrepo.com/show/508699/landscape-placeholder.svg" />
                    <br />
                    <label class="block text-gray-700">Featured Image</label>
                    <input name="featured_image" oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                        type="file" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save
                        Post</button>
                </div>
            </form>
        </div>



    </section>
@endsection
