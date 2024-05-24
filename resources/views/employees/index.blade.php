@extends('layouts.app')
@section('css')
    @parent
@endsection
@section('content')
    <div class="wrapper  d-flex flex-column">
        <h1>Employees</h1>
        <div class="btn-container"><a href="{{ route('users.create') }}" class="btn">Create employee</a></div>
        <div class="container col-md-8">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-md-12">
                        <a href="{{ route('users.edit', $user) }}" class="text-decoration-none">
                            <div class="card employee-card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="employee-name"><span>{{ $user->name }}</span></div>
                                    <div class="employee-speciality"><span>{{ $user->speciality }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col">
                        <span>There are no employees</span>
                    </div>
                @endforelse
            </div>
            {{ $users->links() }}
        </div>
    @endsection
