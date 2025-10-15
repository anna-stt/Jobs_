<x-layout>
  <x-card class="mb-4">
    <form action="{{ route('my-user.update', $my_user) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <x-label for="name" :required="true">Name</x-label>
          <x-text-input name="name" :value="old('name', $my_user->name)" />
        </div>

        <div>
          <x-label for="email" :required="true">Email</x-label>
          <x-text-input name="email" type="email" :value="old('email', $my_user->email)" />
        </div>

        <div class="col-span-2">
          <x-label for="password">Password (leave blank to keep current password)</x-label>
          <x-text-input name="password" type="password" />
        </div>

        <div class="col-span-2">
          <x-label for="description">Description</x-label>
          <textarea name="description" id="description" class="border-gray-300 rounded-md shadow-sm w-full">{{ old('description', $my_user->description) }}</textarea>
        </div>

        <div class="col-span-2">
          <x-label for="role">Role</x-label>
          <x-text-input name="role" :value="old('role', $my_user->role)" />
        </div>

        <div class="col-span-2">
          <x-button class="w-full">Update Profile</x-button>
        </div>
      </div>
    </form>
  </x-card>

  <x-link-button href="{{ route('my-user.index') }}">Back</x-link-button>
</x-layout>
