@extends('layouts.app')
@section('title', 'Students')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-7">
    <div>
        <h1 class="text-[22px] font-bold text-slate-900 tracking-tight">Students</h1>
        <p class="text-[13px] text-slate-500 mt-0.5">
            {{ $students->total() }} {{ $students->total() === 1 ? 'record' : 'records' }} total
        </p>
    </div>
    <a href="{{ route('students.create') }}"
       class="inline-flex items-center gap-1.5 bg-brand-600 hover:bg-brand-700 active:scale-95
              text-white text-sm font-semibold px-4 py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
        </svg>
        New Registration
    </a>
</div>

@if ($students->isEmpty())

    <div class="bg-white rounded-2xl shadow-card flex flex-col items-center justify-center py-24 text-center px-6">
        <div class="w-14 h-14 rounded-2xl bg-brand-50 flex items-center justify-center mb-4">
            <svg class="w-7 h-7 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <p class="text-[15px] font-semibold text-slate-700 mb-1">No students yet</p>
        <p class="text-sm text-slate-400 mb-6 max-w-xs">Register the first student to see them here.</p>
        <a href="{{ route('students.create') }}"
           class="text-sm font-semibold text-brand-600 hover:text-brand-700 underline underline-offset-2 transition-colors">
            Get started
        </a>
    </div>

@else

    <div class="bg-white rounded-2xl shadow-card overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-slate-400 uppercase tracking-widest">Student</th>
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-slate-400 uppercase tracking-widest hidden sm:table-cell">ID</th>
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-slate-400 uppercase tracking-widest hidden md:table-cell">Program</th>
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-slate-400 uppercase tracking-widest hidden lg:table-cell">Year</th>
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-slate-400 uppercase tracking-widest hidden xl:table-cell">Email</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="border-b border-slate-50 hover:bg-slate-50/60 transition-colors group">

                    {{-- Avatar + name --}}
                    <td class="px-5 py-3.5">
                        <div class="flex items-center gap-3">
                            <img src="{{ $student->profile_picture_url }}"
                                 alt="{{ $student->full_name }}"
                                 class="w-8 h-8 rounded-full object-cover flex-shrink-0 ring-1 ring-white shadow-sm">
                            <span class="font-semibold text-slate-800 text-[13px]">{{ $student->full_name }}</span>
                        </div>
                    </td>

                    {{-- ID --}}
                    <td class="px-5 py-3.5 hidden sm:table-cell">
                        <code class="text-[11px] text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded font-mono">
                            {{ $student->student_id }}
                        </code>
                    </td>

                    {{-- Program --}}
                    <td class="px-5 py-3.5 text-[13px] text-slate-500 hidden md:table-cell">
                        {{ $student->program }}
                    </td>

                    {{-- Year --}}
                    <td class="px-5 py-3.5 hidden lg:table-cell">
                        <span class="text-[11px] font-semibold text-brand-600 bg-brand-50
                                     border border-brand-100 px-2 py-0.5 rounded-full">
                            {{ $student->year_level }}
                        </span>
                    </td>

                    {{-- Email --}}
                    <td class="px-5 py-3.5 text-[13px] text-slate-400 hidden xl:table-cell">
                        {{ $student->email }}
                    </td>

                    {{-- Action --}}
                    <td class="px-5 py-3.5 text-right">
                        <a href="{{ route('students.show', $student->id) }}"
                           class="text-[13px] font-semibold text-brand-600 hover:text-brand-800
                                  opacity-0 group-hover:opacity-100 transition-all">
                            View &rarr;
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($students->hasPages())
            <div class="px-5 py-3.5 border-t border-slate-100 text-sm">
                {{ $students->links() }}
            </div>
        @endif
    </div>

@endif
@endsection
