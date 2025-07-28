<x-app-layout>
    
    <link rel="stylesheet" href="/css/creative-form.css">

    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">My Time Logs</h2>
    </x-slot>

    <div class="py-6 px-6">
        <a href="{{ route('timelogs.create') }}" class="creative-btnatag mb-4">+ Add New Task</a>

        <div class="mt-6">
            @forelse ($logs as $date => $items)
                @php
                    $totalMinutes = $items->sum(fn($log) => $log->hours * 60 + $log->minutes);
                    $totalHours = intdiv($totalMinutes, 60);
                    $totalMins = $totalMinutes % 60;
                @endphp
                <div class="mt-8">
                    <div class="mb-2 flex items-center">
                        <h3 class="font-semibold text-lg text-gray-200 mr-4">{{ $date }}</h3>
                        <span class="text-sm text-gray-400 ml-4"> (Total: {{ $totalHours }}h {{ $totalMins }}m)</span>
                    </div>
                    <div class="overflow-x-auto rounded-lg shadow">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Task</th>
                                    <th class="px-4 py-2">Hours</th>
                                    <th class="px-4 py-2">Minutes</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $log)
                                    <tr class="hover:bg-blue-50 dark:hover:bg-blue-900">
                                        <td class="px-4 py-2">{{ $log->task }}</td>
                                        <td class="px-4 py-2">{{ $log->hours }}</td>
                                        <td class="px-4 py-2">{{ $log->minutes }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('timelogs.edit', $log->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 dark:text-gray-400 mt-12">
                    <svg class="mx-auto mb-4 w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p>No time logs found. Start by adding your first task!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
