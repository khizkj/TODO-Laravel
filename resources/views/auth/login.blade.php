<x-layout>
    <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-center text-indigo-700 mb-6">Login to Your Account</h2>

        <form method="POST" action="/login">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full mt-1 border border-gray-300 rounded px-4 py-2 focus:ring-indigo-400 focus:outline-none" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                       class="w-full mt-1 border border-gray-300 rounded px-4 py-2 focus:ring-indigo-400 focus:outline-none" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>



            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition">Login</button>
        </form>

        <p class="text-sm mt-4 text-center">Don’t have an account?
            <a href="/signup" class="text-indigo-600 hover:underline">Sign up</a>
        </p>
    </div>
</x-layout>
