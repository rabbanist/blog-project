@extends('frontend.layouts.app')

@section('content')
    <section class="min-h-[500px] flex items-center justify-center bg-gradient-to-r from-blue-400 to-indigo-700 text-white">
        <div class="text-center px-6">
            <h1 class="text-5xl font-extrabold mb-4 animate-pulse">🚀 Coming Soon</h1>
            <p class="text-xl mb-6">We're working on something awesome. Stay tuned!</p>

            <form class="flex flex-col sm:flex-row justify-center gap-4">
                <input type="email" placeholder="Enter your email"
                    class="px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-300 w-72" />
                <button type="submit"
                    class="bg-white text-indigo-700 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-100 transition">
                    Notify Me
                </button>
            </form>
        </div>
    </section>
@endsection
