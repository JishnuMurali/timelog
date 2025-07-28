<x-app-layout>
    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">Edit Time Log</h2>
    </x-slot>
    <link rel="stylesheet" href="/css/creative-form.css">
    <div class="min-h-screen flex items-baseline justify-center py-8 px-2 bg-black">
        <div class="creative-form-card">
            <form method="POST" action="{{ route('timelogs.update', $log->id) }}">
                @csrf
                @method('PUT')
                <div class="creative-form-grid">
                    <div>
                        <label class="creative-label">Date</label>
                        <input type="date" name="log_date" value="{{ $log->log_date }}" max="{{ date('Y-m-d') }}" required class="creative-input" />
                    </div>
                    <div>
                        <label class="creative-label">Task</label>
                        <input type="text" name="task" value="{{ $log->task }}" required class="creative-input" />
                    </div>
                    <div>
                        <label class="creative-label">Hours</label>
                        <input type="number" name="hours" value="{{ $log->hours }}" min="0" max="10" required class="creative-input" />
                    </div>
                    <div>
                        <label class="creative-label">Minutes</label>
                        <input type="number" name="minutes" value="{{ $log->minutes }}" min="0" max="59" required class="creative-input" />
                    </div>
                </div>
                <button type="submit" class="creative-btn mt-10">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
