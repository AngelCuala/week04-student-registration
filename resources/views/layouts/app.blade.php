<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui'] },
                    colors: {
                        brand: {
                            50:  '#f0f5ff',
                            100: '#e0eaff',
                            200: '#c7d7fe',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            900: '#312e81',
                        }
                    },
                    boxShadow: {
                        'card': '0 1px 3px 0 rgb(0 0 0 / .06), 0 1px 2px -1px rgb(0 0 0 / .04)',
                        'card-hover': '0 4px 12px 0 rgb(0 0 0 / .08)',
                    }
                }
            }
        }
    </script>
    <style>
        * { -webkit-font-smoothing: antialiased; }
        body { font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui; }

        .toast-enter {
            animation: toastIn .28s cubic-bezier(.21,1.02,.73,1) both;
        }
        @keyframes toastIn {
            from { opacity: 0; transform: translateY(-10px) scale(.97); }
            to   { opacity: 1; transform: translateY(0)    scale(1); }
        }

        /* Subtle noise texture on background */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='.015'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 0;
        }

        /* Nav active state helper */
        .nav-link { position: relative; }
        .nav-link.active::after {
            content: '';
            position: absolute; bottom: -1px; left: 0; right: 0;
            height: 2px; background: #4f46e5; border-radius: 2px 2px 0 0;
        }

        /* Input focus glow */
        .field-input:focus {
            box-shadow: 0 0 0 3px rgba(99,102,241,.15);
        }
        .field-input.field-error:focus {
            box-shadow: 0 0 0 3px rgba(239,68,68,.12);
        }
    </style>
</head>
<body class="bg-[#f8f8fc] min-h-screen flex flex-col relative">

    {{-- ── Header ──────────────────────────────────────────────────── --}}
    <header class="relative z-40 bg-white/80 backdrop-blur-md border-b border-slate-200/70 sticky top-0">
        <div class="max-w-screen-xl mx-auto px-5 sm:px-8 h-14 flex items-center justify-between gap-6">

            <a href="{{ route('students.index') }}"
               class="flex items-center gap-2.5 text-slate-900 hover:text-brand-600 transition-colors">
                <div class="w-7 h-7 rounded-lg bg-brand-600 flex items-center justify-center shadow-sm">
                    <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="font-semibold text-[15px] tracking-tight">RegSystem</span>
            </a>

            <nav class="flex items-center h-14 gap-0.5">
                <a href="{{ route('students.index') }}"
                   class="nav-link px-3 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors rounded-md hover:bg-slate-100">
                    Students
                </a>
                <a href="{{ route('students.create') }}"
                   class="ml-2 inline-flex items-center gap-1.5 bg-brand-600 hover:bg-brand-700
                          text-white text-sm font-semibold px-3.5 py-1.5 rounded-lg transition-all
                          shadow-sm hover:shadow-md active:scale-95">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Register
                </a>
            </nav>
        </div>
    </header>

    {{-- ── Notifications ────────────────────────────────────────────── --}}
    <div class="relative z-30 max-w-screen-xl mx-auto px-5 sm:px-8 w-full">
        @if (session('success'))
            <div class="toast-enter mt-4 flex items-center gap-3 rounded-xl px-4 py-3
                        bg-emerald-600 text-white shadow-lg shadow-emerald-900/10" id="flash-ok">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
                <p class="flex-1 text-sm font-medium">{{ session('success') }}</p>
                <button onclick="document.getElementById('flash-ok').remove()"
                        class="opacity-70 hover:opacity-100 transition-opacity" aria-label="Dismiss">
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="toast-enter mt-4 flex items-center gap-3 rounded-xl px-4 py-3
                        bg-red-600 text-white shadow-lg shadow-red-900/10">
                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <p class="flex-1 text-sm font-medium">{{ session('error') }}</p>
            </div>
        @endif
    </div>

    {{-- ── Content ──────────────────────────────────────────────────── --}}
    <main class="relative z-10 flex-1 max-w-screen-xl mx-auto px-5 sm:px-8 w-full py-8">
        @yield('content')
    </main>

    {{-- ── Footer ───────────────────────────────────────────────────── --}}
    <footer class="relative z-10 border-t border-slate-200/80 mt-auto">
        <div class="max-w-screen-xl mx-auto px-5 sm:px-8 py-4">
            <p class="text-xs text-slate-400">&copy; {{ date('Y') }} Student Registration System</p>
        </div>
    </footer>

</body>
</html>
