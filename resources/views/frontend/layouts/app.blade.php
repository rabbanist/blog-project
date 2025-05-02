<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laravel Blog</title>
    {!! ToastMagic::styles() !!}
</head>


<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ url('/') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
        </ul>

        <ul class="flex items-center">

            <li>
                <a href="#" class="p-3">Tom</a>
            </li>
            <li>
                <form action="" method="post" class="p-3 inline">
                    <button type="submit">Logout</button>
                </form>
            </li>


            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>

        </ul>
    </nav>

    <div class="container mx-auto mt-6 px-6">
        @yield('content')
    </div>

    {!! ToastMagic::scripts() !!}


    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastMagic.error("{{ $error }}");
            @endforeach
        </script>
    @endif

    @if (session('success'))
        <script>
            toastMagic.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastMagic.error("{{ session('error') }}");
        </script>
    @endif

</body>

</html>
