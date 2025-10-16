<x-layout>
    <x-breadcrumbs :links="['My Profile' => route('my-user.index')]" class="mb-4" />
    <x-card class="mb-4">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <x-label for="name">Name</x-label>
                <div class="p-2 border rounded bg-gray-50">{{ $my_user->name }}</div>
            </div>
            <div>
                <x-label for="email">Email</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $my_user->email }}</div>
            </div>
            <div class="col-span-2">
                <x-label for="description">Description</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $my_user->description }}</div>
            </div>
            <div class="col-span-2  ">
                <x-label for="role">Role</x-label>
                <div class="p-2 border  rounded bg-gray-50">{{ $my_user->role }}</div>
            </div>

            <x-button class="" >Download CV

            </x-button>
        </div>
    </x-card>
    <div class="flex justify-between items-between space-x-6">
    <x-link-button href="{{ route('jobs.index') }}">Back</x-link-button>

    <x-link-button href="{{ route('my-user.edit') }}">Edit Profile</x-link-button>

    </div>

</x-layout>
