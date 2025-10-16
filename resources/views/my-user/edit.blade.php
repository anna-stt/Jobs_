<x-layout>
  <x-card class="mb-4">
    <form action="{{ route('my-user.update', $my_user) }}" method="POST">
      @csrf
      @method('PUT')
        <div class="flex justify-between items-between space-x-6">
            <div class="flex-1">
            <x-label for="name" :required="true">Name</x-label>
            <div class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2">{{ $my_user->name }}</div>
            </div>
            <div>
              <x-label for="profile_picture">Profile Picture</x-label>
              <x-button class="w-full">Upload Profile Picture</x-button>
            </div>
        </div>
      <div class="mb-4 grid grid-cols-2 gap-4">

        <div class="col-span-2">
          <x-label for="email" :required="true">Email</x-label>
          <div class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2">{{ $my_user->email }}</div>
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

          <x-label for="cv">CV</x-label>
          <x-text-input type="file" name="cv" />

        </div>

        <div class="col-span-2">
          <x-button class="w-full">Update Profile</x-button>
        </div>
      </div>
    </form>
  </x-card>

  <x-link-button href="{{ route('my-user.index') }}">Back</x-link-button>
</x-layout>
