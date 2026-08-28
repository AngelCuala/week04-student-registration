@extends('layouts.app')
@section('title', 'Register Student')

@section('content')

{{-- Page heading --}}
<div class="mb-7">
    <h1 class="text-[22px] font-bold text-slate-900 tracking-tight">New Student Registration</h1>
    <p class="text-[13px] text-slate-500 mt-1">Fill in the details below. Fields marked <span class="text-red-500">*</span> are required.</p>
</div>

{{-- Error banner --}}
@if ($errors->any())
<div class="mb-6 rounded-xl bg-red-50 border border-red-100 p-4">
    <div class="flex gap-3">
        <div class="w-5 h-5 rounded-full bg-red-500 flex-shrink-0 flex items-center justify-center mt-0.5">
            <svg class="w-3 h-3 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-red-800">{{ $errors->count() }} {{ $errors->count() === 1 ? 'error' : 'errors' }} found</p>
            <ul class="mt-1.5 space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li class="text-xs text-red-600 before:content-['–'] before:mr-1.5">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<form action="{{ route('students.store') }}" method="POST"
      enctype="multipart/form-data" novalidate>
@csrf

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- ── LEFT: form fields (2/3 width) ─────────────────────────── --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Personal info block --}}
        <div class="bg-white rounded-2xl shadow-card p-6">
            <h2 class="text-[13px] font-semibold text-slate-400 uppercase tracking-widest mb-5">Personal Information</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Student ID --}}
                <div class="field-group">
                    <label for="student_id" class="field-label">Student ID <span class="text-red-500">*</span></label>
                    <input id="student_id" name="student_id" type="text"
                           value="{{ old('student_id') }}" placeholder="e.g. 2024-00001"
                           class="field-input {{ $errors->has('student_id') ? 'field-error' : '' }}">
                    @error('student_id')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Email --}}
                <div class="field-group">
                    <label for="email" class="field-label">Email Address <span class="text-red-500">*</span></label>
                    <input id="email" name="email" type="email"
                           value="{{ old('email') }}" placeholder="juan@school.edu.ph"
                           class="field-input {{ $errors->has('email') ? 'field-error' : '' }}">
                    @error('email')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- First Name --}}
                <div class="field-group">
                    <label for="first_name" class="field-label">First Name <span class="text-red-500">*</span></label>
                    <input id="first_name" name="first_name" type="text"
                           value="{{ old('first_name') }}" placeholder="Juan"
                           class="field-input {{ $errors->has('first_name') ? 'field-error' : '' }}">
                    @error('first_name')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Middle Name --}}
                <div class="field-group">
                    <label for="middle_name" class="field-label">
                        Middle Name <span class="text-[11px] font-normal text-slate-400 ml-1">optional</span>
                    </label>
                    <input id="middle_name" name="middle_name" type="text"
                           value="{{ old('middle_name') }}" placeholder="Santos"
                           class="field-input">
                </div>

                {{-- Last Name --}}
                <div class="field-group">
                    <label for="last_name" class="field-label">Last Name <span class="text-red-500">*</span></label>
                    <input id="last_name" name="last_name" type="text"
                           value="{{ old('last_name') }}" placeholder="Dela Cruz"
                           class="field-input {{ $errors->has('last_name') ? 'field-error' : '' }}">
                    @error('last_name')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Mobile --}}
                <div class="field-group">
                    <label for="mobile_number" class="field-label">Mobile Number <span class="text-red-500">*</span></label>
                    <input id="mobile_number" name="mobile_number" type="text"
                           value="{{ old('mobile_number') }}" placeholder="09XXXXXXXXX" inputmode="numeric"
                           class="field-input {{ $errors->has('mobile_number') ? 'field-error' : '' }}">
                    @error('mobile_number')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Date of Birth --}}
                <div class="field-group">
                    <label for="date_of_birth" class="field-label">Date of Birth <span class="text-red-500">*</span></label>
                    <input id="date_of_birth" name="date_of_birth" type="date"
                           value="{{ old('date_of_birth') }}" max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                           class="field-input {{ $errors->has('date_of_birth') ? 'field-error' : '' }}">
                    @error('date_of_birth')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Gender --}}
                <div class="field-group">
                    <label for="gender" class="field-label">Gender <span class="text-red-500">*</span></label>
                    <select id="gender" name="gender"
                            class="field-input {{ $errors->has('gender') ? 'field-error' : '' }}">
                        <option value="">Select gender</option>
                        @foreach (['Male', 'Female', 'Other'] as $g)
                            <option value="{{ $g }}" @selected(old('gender') === $g)>{{ $g }}</option>
                        @endforeach
                    </select>
                    @error('gender')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

            </div>
        </div>

        {{-- Academic info block --}}
        <div class="bg-white rounded-2xl shadow-card p-6">
            <h2 class="text-[13px] font-semibold text-slate-400 uppercase tracking-widest mb-5">Academic Information</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Program --}}
                <div class="field-group sm:col-span-2">
                    <label for="program" class="field-label">Program <span class="text-red-500">*</span></label>
                    <input id="program" name="program" type="text"
                           value="{{ old('program') }}" placeholder="e.g. BS Information Technology"
                           class="field-input {{ $errors->has('program') ? 'field-error' : '' }}">
                    @error('program')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Year Level --}}
                <div class="field-group">
                    <label for="year_level" class="field-label">Year Level <span class="text-red-500">*</span></label>
                    <select id="year_level" name="year_level"
                            class="field-input {{ $errors->has('year_level') ? 'field-error' : '' }}">
                        <option value="">Select year</option>
                        @foreach (['1st Year', '2nd Year', '3rd Year', '4th Year'] as $y)
                            <option value="{{ $y }}" @selected(old('year_level') === $y)>{{ $y }}</option>
                        @endforeach
                    </select>
                    @error('year_level')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

                {{-- Address --}}
                <div class="field-group sm:col-span-2">
                    <label for="address" class="field-label">Address <span class="text-red-500">*</span></label>
                    <textarea id="address" name="address" rows="3"
                              placeholder="House No., Street, Barangay, City, Province"
                              class="field-input resize-none {{ $errors->has('address') ? 'field-error' : '' }}">{{ old('address') }}</textarea>
                    @error('address')<p class="field-msg">{{ $message }}</p>@enderror
                </div>

            </div>
        </div>

    </div>

    {{-- ── RIGHT: photo + submit (1/3 width) ─────────────────────── --}}
    <div class="space-y-5">

        {{-- Profile photo card --}}
        <div class="bg-white rounded-2xl shadow-card p-6">
            <h2 class="text-[13px] font-semibold text-slate-400 uppercase tracking-widest mb-5">
                Profile Photo <span class="text-red-500">*</span>
            </h2>

            {{-- Preview --}}
            <div class="flex flex-col items-center gap-4">
                <div id="preview-ring"
                     class="w-28 h-28 rounded-full bg-slate-100 ring-2 ring-slate-200 overflow-hidden
                            flex items-center justify-center transition-all">
                    <img id="preview-img" src="" alt="" class="hidden w-full h-full object-cover">
                    <svg id="preview-ph" class="w-12 h-12 text-slate-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>

                <label for="profile_picture"
                       class="w-full cursor-pointer rounded-xl border-2 border-dashed
                              {{ $errors->has('profile_picture') ? 'border-red-300 bg-red-50' : 'border-slate-200 hover:border-brand-400 hover:bg-brand-50' }}
                              transition-all px-4 py-3 text-center">
                    <svg class="w-5 h-5 mx-auto mb-1 {{ $errors->has('profile_picture') ? 'text-red-400' : 'text-slate-400' }}"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <p class="text-xs font-medium {{ $errors->has('profile_picture') ? 'text-red-600' : 'text-slate-600' }}">
                        Click to upload
                    </p>
                    <p class="text-[11px] text-slate-400 mt-0.5">JPG or PNG, max 2 MB</p>
                    <input type="file" id="profile_picture" name="profile_picture"
                           accept="image/png,image/jpeg" class="hidden"
                           onchange="handlePhoto(event)">
                </label>
                <p id="file-name" class="text-[11px] text-slate-400 text-center -mt-2 hidden"></p>

                @error('profile_picture')
                    <p class="field-msg w-full">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Submit card --}}
        <div class="bg-white rounded-2xl shadow-card p-5 flex flex-col gap-3">
            <button type="submit"
                    class="w-full bg-brand-600 hover:bg-brand-700 active:scale-[.98] text-white
                           font-semibold text-sm py-2.5 rounded-xl transition-all shadow-sm
                           hover:shadow-md">
                Register Student
            </button>
            <a href="{{ route('students.index') }}"
               class="w-full text-center text-sm text-slate-500 hover:text-slate-800
                      py-2 rounded-xl hover:bg-slate-100 transition-colors">
                Cancel
            </a>
        </div>

    </div>
</div>

</form>

{{-- Shared field styles via a small style block (avoids repeating long class strings) --}}
<style>
    .field-group { display: flex; flex-direction: column; }
    .field-label { font-size: .8125rem; font-weight: 500; color: #374151; margin-bottom: .375rem; }
    .field-input {
        width: 100%; border-radius: .625rem; border: 1px solid #e2e8f0;
        background: #fff; padding: .5625rem .875rem; font-size: .875rem;
        color: #0f172a; transition: border-color .15s, box-shadow .15s;
        outline: none; font-family: inherit;
    }
    .field-input::placeholder { color: #94a3b8; }
    .field-input:hover { border-color: #cbd5e1; }
    .field-input:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); }
    .field-input.field-error { border-color: #fca5a5; background: #fff7f7; }
    .field-input.field-error:focus { border-color: #ef4444; box-shadow: 0 0 0 3px rgba(239,68,68,.1); }
    .field-msg { font-size: .75rem; color: #dc2626; margin-top: .375rem; }
</style>

<script>
function handlePhoto(e) {
    const file = e.target.files[0];
    if (!file) return;
    const img  = document.getElementById('preview-img');
    const ph   = document.getElementById('preview-ph');
    const ring = document.getElementById('preview-ring');
    const name = document.getElementById('file-name');

    name.textContent = file.name;
    name.classList.remove('hidden');
    ring.classList.add('ring-brand-400');
    ring.classList.remove('ring-slate-200');

    const reader = new FileReader();
    reader.onload = ev => {
        img.src = ev.target.result;
        img.classList.remove('hidden');
        ph.classList.add('hidden');
    };
    reader.readAsDataURL(file);
}
</script>
@endsection
