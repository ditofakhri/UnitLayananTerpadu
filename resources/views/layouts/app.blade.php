<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ULT — Unit Layanan Terpadu</title>

  <!-- ✅ FAVICON (LOGO TAB) -->
  <link rel="icon" href="{{ asset('icon/logo.png') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900">
  <div class="min-h-screen">
    <header class="bg-white border-b">
      <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <div>
          <div class="text-lg font-bold">Unit Layanan Terpadu (ULT)</div>
          <div class="text-sm text-slate-500">Sistem Log Petugas Jaga & Form Tamu</div>
        </div>

        <nav class="flex gap-2">

          <a href="{{ route('dashboard') }}"
            class="block px-4 py-3 rounded-xl hover:bg-slate-100 transition
             {{ request()->routeIs('dashboard')
               ? 'bg-blue-600 text-white font-semibold shadow'
               : 'text-gray-700 hover:bg-blue-100' }}">
             Dashboard
          </a>

          <a href="{{ route('log.index') }}"
           class="block px-4 py-3 rounded-xl transition hover:bg-slate-100
           {{ request()->routeIs('log.*')
                ? 'bg-blue-600 text-white font-semibold shadow'
                : 'text-gray-700 hover:bg-blue-100' }}">
           Log Petugas Jaga
          </a>

          <a href="{{ route('tamu.index') }}"
           class="block px-4 py-3 rounded-xl transition hover:bg-slate-100
           {{ request()->routeIs('tamu.*')
                ? 'bg-blue-600 text-white font-semibold shadow'
                : 'text-gray-700 hover:bg-blue-100' }}">
           Form Tamu
          </a>

          <a href="{{ route('report.index') }}"
           class="block px-4 py-3 rounded-xl transition hover:bg-slate-100
           {{ request()->routeIs('report.*')
                ? 'bg-blue-600 text-white font-semibold shadow'
                : 'text-gray-700 hover:bg-blue-100' }}">
           Report
          </a>

        </nav>
      </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-6">
      @if(session('ok'))
        <div class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-800">
          {{ session('ok') }}
        </div>
      @endif

      @if($errors->any())
        <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-red-800">
          <div class="font-semibold mb-1">Terjadi kesalahan:</div>
          <ul class="list-disc ml-5">
            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
          </ul>
        </div>
      @endif

      @yield('content')
    </main>    
  </div>
</body>

{{-- FOOTER --}}
<footer class="border-t bg-white">
  <div class="max-w-7xl mx-auto px-6 py-4 text-center">
    <div class="text-sm text-slate-600 font-medium">
      Balai Bahasa Provinsi Jawa Tengah
    </div>

    <div class="text-xs text-slate-500 mt-1">
      Design by:
      <a href="https://www.instagram.com/ditooluck/"
         target="_blank"
         class="font-semibold text-slate-700 hover:text-blue-600 transition">
        @ditooluck
      </a>
    </div>
  </div>
</footer>

</html>