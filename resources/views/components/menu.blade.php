<ul>
    <a href="{{ route('my-user.index') }}">Perfil</a>
</ul>

<ul>
    <a href="{{ route('my-job-application.index') }}">Applications</a>
</ul>
<ul>
    <a href="{{ route('my-jobs.index') }}">My Jobs</a>
</ul>
<ul>
    <form action="{{ route('auth.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Logout</button>
    </form>
</ul>
