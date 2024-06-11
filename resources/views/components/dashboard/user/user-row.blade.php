<tr>
    <td>
        <a href="{{ route('dashboard.user.show', $user->id) }}">
            {{ $user->name }}
        </a>
    </td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role ?? 'Regular user' }}</td>
    <x-dashboard.user.Parts.changerole :user="$user" />

</tr>
