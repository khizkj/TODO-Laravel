<x-layout>
    <!-- Page Title -->
    <h2 class="text-4xl font-extrabold mb-10 text-indigo-700 tracking-tight flex items-center gap-2">
        📝 @auth {{ auth()->user()->name }} @endauth Todo List
    </h2>

    @if ($todo->count())
        <div class="space-y-5">
            @foreach ($todo as $task)
                <div
                    class="glass p-6 rounded-2xl shadow-lg hover:shadow-xl hover:scale-[1.01] transition-all duration-300">
                    <div class="flex justify-between items-center">
                        <div>
                            <!-- Task Title: big, modern, readable -->
                            <h3 class="text-2xl font-semibold text-gray-800 mb-1 tracking-tight leading-snug">
                                {{ $task->task }}
                            </h3>
                            <p class="text-sm text-gray-500">{{ $task->description }}</p>
                        </div>
                        <div class="space-x-3">
                            <a href="/todos/{{ $task->id }}/edit"
                                class="text-indigo-600 hover:text-indigo-800 hover:underline font-medium">Edit</a>
                            <form method="POST" action="/todos/{{ $task->id }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:text-red-700 hover:underline font-medium">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            <div class="bg-white/50 backdrop-blur-md rounded-xl px-4 py-3 shadow-md">
                {{ $todo->links('pagination::tailwind') }}
            </div>
        </div>
    @else
        <p class="text-center text-gray-600 mt-16 text-lg">
            No tasks found. <a href="/todos/create" class="text-indigo-600 underline">Create your first task</a> ✅
        </p>
    @endif
</x-layout>
