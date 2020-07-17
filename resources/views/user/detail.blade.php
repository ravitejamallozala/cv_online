@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card text-left w-75">
                <div class="card-header text-center ">
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Email: </b> {{ $user->email }}</h5>
                    @if((!is_null($user->cv)))
                        <p class="card-text"><b>Name: </b> {{ $user->name  }}</p>
                        <p class="card-text"><b>Work Experience: </b> {{ $user->cv->work_exp  }}</p>
                        <p class="card-text"><b>Current Location: </b> {{ $user->cv->current_location  }}</p>
                        <p class="card-text"><b>Education: </b> {{ $user->cv->education  }}</p>
                        <p class="card-text"><b>Year Of Graduation: </b> {{ $user->cv->year_of_grad  }}</p>
                        <p class="card-text"><b>Projects: </b> {{ $user->cv->projects  }}</p>
                        @if((!is_null($user->cv->skills)))
                            <b>Skills: </b>
                        @foreach($user->cv->skills as $skill)
                                <span class="badge bg-secondary badge-primary"><h5 class="m-1">{{ $skill->name }}</h5></span>
                            @endforeach
                        @endif
                    @else
                    <p class="card-text pt-2"><b>Info: </b> Not Available</p>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('profile.getall') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
