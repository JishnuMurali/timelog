<x-app-layout>
    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">Apply for Leave</h2>
    </x-slot>
    <link rel="stylesheet" href="/css/creative-form.css">
    <div class="min-h-screen flex items-baseline justify-center py-8 px-2 bg-black">
        <div class="creative-form-card">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg shadow">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg shadow">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('leaves.store') }}">
                @csrf
                <div>
                    <label class="creative-label">Start Date</label>
                    <input type="date" name="start_date" min="{{ date('Y-m-d') }}" required class="creative-input" />
                </div>
                <div>
                    <label class="creative-label">End Date</label>
                    <input type="date" name="end_date" min="{{ date('Y-m-d') }}" required class="creative-input" />
                </div>
                <button type="submit" class="creative-btn mt-10">Apply</button>
            </form>
        </div>
    </div>
</x-app-layout>
