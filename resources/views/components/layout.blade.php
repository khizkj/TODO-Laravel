<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        * {
            transition: all 0.3s ease;
        }

        .glass {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <header class="bg-indigo-600 text-white shadow-md p-4">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <a href="/"><h1 class="text-2xl font-bold tracking-wide">📝 Elegant Todo</h1></a>
        <nav class="space-x-4">
            @guest
            <a href="/">Home</a>
            @endguest
            @auth
            <a href="/todos">Your Todo</a>
            <a href="/todos/create" class="bg-white text-indigo-600 px-3 py-1 rounded hover:bg-purple-100">+ Add Task</a>
            @endauth
            @guest
                <a href="/signup" class="bg-white text-indigo-600 px-3 py-1 rounded hover:bg-purple-100">Sign Up</a>
                <a href="/login" class="bg-white text-indigo-600 px-3 py-1 rounded hover:bg-purple-100">Login</a>
            @endguest

            @auth
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="bg-white text-indigo-600 px-3 py-1 rounded hover:bg-purple-100">
                        Logout
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>


    <main class="max-w-3xl mx-auto p-6 fade-in">
        {{ $slot }}
    </main>
</body>
</html>
