@extends('dashboard.layouts.adminTemplate')
@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @forelse ($users as $user)
            <x-Dashboard.User.UserRow :user="$user" />

        @empty
            <tr>
                <td colspan="4" class="alert-no-records"> No users </td>
            </tr>
        @endforelse
    </table>
@endsection
