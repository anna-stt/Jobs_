<x-layout>
    <x-breadcrumbs :links="['My Profile' => route('my-user.index')]" class="mb-4" />
    <x-card class="mb-4">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <x-label for="name">Name</x-label>
                <div class="p-2 border rounded bg-gray-50">{{ $user->name }}</div>
            </div>
            <div>
                <x-label for="email">Email</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $user->email }}</div>
            </div>
            <div class="col-span-2">
                <x-label for="description">Description</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $user->description }}</div>
            </div>
            <div class="col-span-2  ">
                <x-label for="role">Role</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $user->role }}</div>
            </div>
        </div>
    </x-card>
    <div class="flex justify-between items-between space-x-6">
    <x-link-button href="{{ route('jobs.index') }}">Back</x-link-button>

    <x-link-button href="{{ route('my-user.edit', $user) }}">Edit Profile</x-link-button>

    </div>

</x-layout>
