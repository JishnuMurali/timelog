<x-app-layout>
    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">Log Your Time</h2>
    </x-slot>

    <link rel="stylesheet" href="/css/creative-form.css">
    <div class="py-6 px-6 space-y-4">
        @if(session('success'))
            <p class="text-green-600 text-center">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-red-600 text-center">{{ session('error') }}</p>
        @endif

        <div class="creative-form-card">
            <form method="POST" action="{{ route('timelogs.store') }}">
                @csrf
                <div>
                    <label class="creative-label">Date</label>
                    <input type="date" name="log_date" max="{{ date('Y-m-d') }}" required class="creative-input" />
                </div>
                <div>
                    <label class="creative-label">Task</label>
                    <input type="text" name="task" placeholder="Task" required class="creative-input" />
                </div>
                <div>
                    <label class="creative-label">Hours</label>
                    <input type="number" name="hours" min="0" max="10" required class="creative-input" />
                </div>
                <div>
                    <label class="creative-label">Minutes</label>
                    <input type="number" name="minutes" min="0" max="59" required class="creative-input" />
                </div>
                <button type="submit" class="creative-btn mt-10">Add Task</button>
            </form>
        </div>
    </div>
</x-app-layout>
