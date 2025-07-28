<x-app-layout>
    <link rel="stylesheet" href="/css/creative-form.css">
    <x-slot name="header">
        <h2 class="creative-form-title" style="font-size:2rem; margin-bottom: 0.5rem;">Dashboard</h2>
    </x-slot>
    <div class="py-8 px-4 max-w-2xl mx-auto">
        <div class="space-y-6">
            <div class="rounded-xl bg-[#181f2a] shadow-lg p-6">
                <a href="{{ route('timelogs.index') }}" class="flex items-center space-x-3 mb-4 group">
                    <svg class="w-5 h-5 mr-2 text-cyan-400 group-hover:text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-lg font-semibold text-cyan-200 group-hover:text-cyan-100">Manage Time Logs</span>
                </a>
                <p class="text-base text-gray-400 mb-6 ml-10">View, add, and edit your daily work logs.</p>
                <a href="{{ route('leaves.index') }}" class="flex items-center space-x-3 mb-4 group">
                    <svg class="w-5 h-5 mr-2 text-cyan-400 group-hover:text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span class="text-lg font-semibold text-cyan-200 group-hover:text-cyan-100">Apply for Leave</span>
                </a>
                <p class="text-base text-gray-400 ml-10">Request and view your leave applications.</p>
            </div>
        </div>
    </div>
</x-app-layout>
