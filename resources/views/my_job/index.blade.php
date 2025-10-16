<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-job-card :$job>
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                <form action="{{ route('job.jobApplications.cv.index', [$job, $application]) }}" method="GET">
                <button class="font-medium text-indigo-500 hover:underline">Download CV</button>
                </form>
              </div>
            </div>

            <div>${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div class="mb-2">No applications yet</div>
        @endforelse

        @if ($job->deleted_at)
        <div class="text-red-500">This job is deleted</div>
        @else
        <div class="flex space-x-2">
          <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>

          <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Delete</x-button>
          </form>
        </div>
        @endif
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
        Post your first job <a class="text-indigo-500 hover:underline"
          href="{{ route('my-jobs.create') }}">here!</a>
      </div>
    </div>
  @endforelse
    <div>
        <x-link-button :href="route('jobs.index')">
        Back
        </x-link-button>
    </div>
</x-layout>
