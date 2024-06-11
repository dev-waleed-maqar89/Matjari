@extends('main.layouts.mainTemblate')
@section('content')
    {{ $categories->links() }}
    <table class="table">
        <tbody>
            <tr>
                <td>Name</td>
                <td>Edit</td>
            </tr>
            @forelse ($categories as $category)
                <x-dashboard.category.CategoryRow :category="$category" />
            @empty
                <tr>
                    <td colspan="2" class="alert-no-records"> No categories </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
