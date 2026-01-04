@extends('admin.layouts.tailwind-master')

@section('title', 'Edit Blog')

@section('content')
    <div class="max-w-2xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Entry</h1>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="edit-category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        id="edit-category" name="category" required onchange="toggleBlogFields()">
                        <option value="blog" @if ($blog->category === 'blog') selected @endif>Blog</option>
                        <option value="feedback" @if ($blog->category === 'feedback') selected @endif>Feedback</option>
                    </select>
                </div>

                <div id="blog-fields" @if ($blog->category === 'feedback') style="display: none;" @endif class="space-y-6">
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                        <input type="file"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            id="gambar" name="gambar">
                        @if ($blog->foto)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $blog->foto) }}" alt="{{ $blog->title }}"
                                    class="h-32 w-auto rounded">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="edit-title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            id="edit-title" name="title" value="{{ $blog->title }}" required>
                    </div>

                    <div>
                        <label for="edit-content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            id="edit-content" name="content" rows="5" required>{{ $blog->content }}</textarea>
                    </div>

                    <div>
                        <label for="edit-date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            id="edit-date" name="date" value="{{ $blog->date }}" required>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium">Update</button>
                    <a href="{{ route('admin.blog.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 font-medium">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleBlogFields() {
            const category = document.getElementById('edit-category').value;
            const blogFields = document.getElementById('blog-fields');
            if (category === 'feedback') {
                blogFields.style.display = 'none';
            } else {
                blogFields.style.display = 'block';
            }
        }
    </script>
@endsection
