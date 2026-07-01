<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">
    @php
        $navigation = [
            ['label' => 'Dashboard', 'href' => '/', 'active' => request()->path() === '/'],
            ['label' => 'Departments', 'href' => '/departments', 'active' => request()->is('departments*')],
            ['label' => 'Teachers', 'href' => '/teachers', 'active' => request()->is('teachers*')],
            ['label' => 'Students', 'href' => '/students', 'active' => request()->is('students*')],
            ['label' => 'Courses', 'href' => '/courses', 'active' => request()->is('courses*')],
            ['label' => 'Registrations', 'href' => '/registrations', 'active' => request()->is('registrations*')],
            ['label' => 'Events', 'href' => '/events', 'active' => request()->is('events*')],
        ];
    @endphp

    <div class="app-layout">
        <aside class="sidebar">
            <div class="flex items-center gap-3 border-b border-zinc-700 px-6 py-5">
                <div class="brand-mark">UM</div>
                <div>
                    <div class="text-base font-bold text-white">University Manager</div>
                    <div class="text-xs font-semibold uppercase tracking-wide text-zinc-400">Academic Operations</div>
                </div>
            </div>

            <nav class="flex-1 space-y-1 px-4 py-5">
                @foreach($navigation as $item)
                    <a href="{{ $item['href'] }}" class="sidebar-link {{ $item['active'] ? 'sidebar-link-active' : '' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="main-shell">
            <header class="topbar">
                <div class="topbar-inner">
                    <div>
                        <div class="text-sm font-bold text-zinc-950">University Management</div>
                        <div class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Admin Workspace</div>
                    </div>
                    <div class="border border-zinc-300 bg-white px-3 py-2 text-sm font-semibold text-zinc-800">Admin User</div>
                </div>

                <nav class="mobile-nav">
                    @foreach($navigation as $item)
                        <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                    @endforeach
                </nav>
            </header>

            <main class="page-container">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
