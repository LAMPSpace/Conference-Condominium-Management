{{-- @can('edit', $user)
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endcan --}}
<a href="{{ route('users.create', $user->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
<a href="{{ route('users.create', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>