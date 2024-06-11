<td class="w-25">
    @if ($user->role)
        <form class="single-user-change-role" method="POST" action="{{ route('dashboard.changeRole', $user->id) }}">
            @csrf
            <div class="row">
                <div class="fotm-group col-6">
                    <select name="role" class="form-control">
                        <option value="remove">remove</option>
                        <option value="supervisor" @selected($user->role === 'supervisor')>supervisor</option>
                        <option value="admin" @selected($user->role === 'admin')>admin</option>
                        <option value="moderator" @selected($user->role === 'moderator')>moderator</option>
                    </select>
                </div>
                <div class="fotm-group col-6">
                    <input type="submit" value="Change role" class="form-control btn btn-info"
                        {{ $user->role == 'supervisor' ? 'disabled' : '' }}>
                </div>
            </div>
        </form>
    @else
        <form class="single-user-make-admin" method="POST" action="{{ route('dashboard.makeAdmin', $user->id) }}">
            @csrf
            <div class="form-group">
                <input type="submit" value="Make admin" class="form-control btn btn-primary">
            </div>
        </form>
    @endif
</td>
