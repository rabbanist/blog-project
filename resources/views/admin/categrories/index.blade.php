@extends('admin.layouts.master')

@section('content')
    <!-- Categories -->
    <section id="categories">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold mb-4">Categories</h2>
            <a class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-2"
                href="{{ route('categories.create') }}">Create Category</a>
        </div>
        <!-- Category Listing Table -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Category List</h3>
            <table class="min-w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Category Name</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($categories as $category)
                        <tr class="text-gray-700">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $category->name }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-blue-500 hover:underline">Edit</a>

                                <form class="inline-block" action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-700">
                            <td colspan="3" class="px-4 py-2 border text-center">No categories found.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>

        </div>


    </section>
@endsection
