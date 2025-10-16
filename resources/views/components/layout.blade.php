<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://unpkg.com/@material-tailwind/html@3.0.0-beta.7/dist/material-tailwind.umd.min.js" defer></script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel Job Board</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
  class="from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-indigo-100 text-slate-700">
@auth

  <nav class="mb-8 flex justify-between items-between space-x-6 text-lg font-medium">

  <a href="{{ route('jobs.index') }}" class="hover:underline">Home</a>

  <div class="dropdown relative" data-placement="bottom-end">
    <div class="flex items-center space-x-2">
      <span class="font-medium">{{ auth()->user()->name ?? 'Anynomus' }}</span>
      <img data-toggle="dropdown" aria-expanded="false"
        src="{{ auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('images/default-profile.jpg') }}"
        alt="profile-picture"
        class="object-cover w-11 h-11 rounded-md cursor-pointer">
    </div>
    <div data-role="menu"
      class="hidden absolute right-0 mt-2 bg-white border border-slate-200 rounded-lg shadow-xl shadow-slate-950/[0.025] p-1 z-10">
      <x-menu />
    </div>
  </div>
</nav>
@endauth



@if (session('success'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
        <p class="font-bold">Success!</p>
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session('error'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
        <p class="font-bold">Error!</p>
        <p>{{ session('error') }}</p>
    </div>
@endif
  {{ $slot }}
</body>

</html>
