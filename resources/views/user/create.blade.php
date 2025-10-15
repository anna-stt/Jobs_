<x-layout>
  <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
    Create an account
    </h1>
  <x-card class="mb-4">
    <form action="{{ route('user.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <x-label for="name" :required="true">Name</x-label>
        <x-text-input name="name" />
      </div>

      <div class="mb-4">
        <x-label for="email" :required="true">Email</x-label>
        <x-text-input name="email" type="email" />
      </div>

      <div class="mb-4">
        <x-label for="password" :required="true">Password</x-label>
        <x-text-input name="password" type="password" />
      </div>

      <x-button class="w-full">Create</x-button>
    </form>
  </x-card>
        <x-link-button :href="route('auth.create')">
        Back
        </x-link-button>
</x-layout>
