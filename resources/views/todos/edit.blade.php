<x-layout>
    <h2 class="text-3xl font-semibold mb-6 text-indigo-700">Edit Task</h2>


    <form method="POST" action="/todos/{{ $todo->id }}" class="glass p-6 rounded-xl shadow-md space-y-6">
        @csrf
        @method('PATCH')
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="task" value="{{ old('task', $todo->task) }}"
                class="mt-1 w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>
        @error('task')
            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
        @enderror
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="4"
                class="mt-1 w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">{{ old('description', $todo->description) }}</textarea>
        </div>
        @error('description')
            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
        @enderror
        <button type="submit"
            class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 transform hover:scale-105">Update
            Task</button>
    </form>
</x-layout>
