<x-app-layout>
    
    <link rel="stylesheet" href="/css/creative-form.css">

    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">Your Leaves</h2>
    </x-slot>
    <div class="max-w-2xl mx-auto py-8">
        <a href="{{ route('leaves.create') }}" class=" inline-block mb-6 px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">Apply for Leave</a>
        
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">{{ session('success') }}</div>
        @endif
        @if($leaves->count())
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-left text-gray-700 dark:text-gray-200">Start Date</th>
                            <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-left text-gray-700 dark:text-gray-200">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $leave->start_date }}</td>
                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-100">{{ $leave->end_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-gray-500 dark:text-gray-400 mt-12">
                <svg class="mx-auto mb-4 w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p>No leaves found. Apply for your first leave!</p>
            </div>
        @endif
    </div>
</x-app-layout>
