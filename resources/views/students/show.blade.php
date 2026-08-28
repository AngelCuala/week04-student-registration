@extends('layouts.app')
@section('title', $student->full_name)

@section('content')

{{-- Back --}}
<a href="{{ route('students.index') }}"
   class="inline-flex items-center gap-1.5 text-[13px] text-slate-500 hover:text-slate-800 transition-colors mb-6 group">
    <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    All Students
</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- ── LEFT: profile card ──────────────────────────────────────── --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-card">

            {{-- Hero strip --}}
            <div class="h-20 bg-gradient-to-br from-brand-600 to-brand-900 relative rounded-t-2xl overflow-hidden">
                <div class="absolute inset-0 opacity-20"
                     style="background-image:radial-gradient(circle at 70% 50%,#fff 0%,transparent 60%)"></div>
            </div>

            {{-- Avatar — sits outside overflow so it's never clipped --}}
            <div class="px-6 pb-6">
                <div class="relative -mt-10 mb-4 w-20">
                    <img src="{{ $student->profile_picture_url }}"
                         alt="{{ $student->full_name }}"
                         class="w-20 h-20 rounded-2xl object-cover border-4 border-white shadow-md block">
                </div>

                <h2 class="text-[17px] font-bold text-slate-900 leading-snug">{{ $student->full_name }}</h2>
                <p class="text-[13px] text-slate-500 mt-0.5">{{ $student->program }}</p>

                <div class="mt-4 flex flex-wrap gap-1.5">
                    <span class="text-[11px] font-semibold text-brand-600 bg-brand-50 border border-brand-100 px-2.5 py-1 rounded-full">
                        {{ $student->year_level }}
                    </span>
                    <span class="text-[11px] font-medium text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                        {{ $student->gender }}
                    </span>
                </div>

                <div class="mt-5 pt-5 border-t border-slate-100 space-y-2.5">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-[13px] text-slate-600 break-all">{{ $student->email }}</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <span class="text-[13px] text-slate-600">{{ $student->mobile_number }}</span>
                    </div>
                </div>

                <a href="{{ route('students.create') }}"
                   class="mt-5 w-full inline-flex items-center justify-center gap-1.5
                          bg-brand-600 hover:bg-brand-700 active:scale-95
                          text-white text-[13px] font-semibold py-2.5 rounded-xl transition-all">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Register Another
                </a>
            </div>
        </div>
    </div>

    {{-- ── RIGHT: detail card ──────────────────────────────────────── --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-card overflow-hidden h-full">
            <div class="px-6 py-5 border-b border-slate-100">
                <h3 class="text-[13px] font-semibold text-slate-400 uppercase tracking-widest">Student Information</h3>
            </div>
            <div class="px-6 py-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5">

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Student ID</dt>
                        <dd class="text-sm font-semibold text-slate-700 font-mono">{{ $student->student_id }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Date of Birth</dt>
                        <dd class="text-sm text-slate-700">{{ $student->date_of_birth->format('F d, Y') }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">First Name</dt>
                        <dd class="text-sm text-slate-700">{{ $student->first_name }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Middle Name</dt>
                        <dd class="text-sm text-slate-700">{{ $student->middle_name ?: '—' }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Last Name</dt>
                        <dd class="text-sm text-slate-700">{{ $student->last_name }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Gender</dt>
                        <dd class="text-sm text-slate-700">{{ $student->gender }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Program</dt>
                        <dd class="text-sm text-slate-700">{{ $student->program }}</dd>
                    </div>

                    <div>
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Year Level</dt>
                        <dd class="text-sm text-slate-700">{{ $student->year_level }}</dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Address</dt>
                        <dd class="text-sm text-slate-700 leading-relaxed">{{ $student->address }}</dd>
                    </div>

                    <div class="sm:col-span-2 pt-4 border-t border-slate-100">
                        <dt class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Registered</dt>
                        <dd class="text-[13px] text-slate-400">{{ $student->created_at->format('F j, Y \a\t g:i A') }}</dd>
                    </div>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
