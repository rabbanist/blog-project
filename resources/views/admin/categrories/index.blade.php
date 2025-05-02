@extends('admin.layouts.master')

@section('content')
    <!-- Categories -->
    <section id="categories">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold mb-4">Categories</h2>
            <a class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="">Create Category</a>
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
                    <tr class="text-gray-700">
                        <td class="px-4 py-2 border">sdf</td>
                        <td class="px-4 py-2 border">df</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="" class="text-blue-500 hover:underline">Edit</a>
                            <form class="inline-block" action="" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?')">
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>

                        </td>
                    </tr>


                </tbody>
            </table>
            <br>

        </div>
    </section>
@endsection
