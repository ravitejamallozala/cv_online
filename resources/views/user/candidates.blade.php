@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header row justify-content-center "><h1> All Potential Candidates </h1></div>
        <div class="row pt-3">
            <div class="card-deck">
                @foreach ($users as $user)
                    <div class="card  border-primary mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold"> <b>Name: </b>{{ $user->name }}</h3>
                            <p class="card-text"><b>Education: </b>{{ $user->cv->education }}</p>
                            <p class="card-text"><b>Work Exp: </b>{{ $user->cv->work_exp }}</p>
                            <p class="card-text"><b>Location: </b>{{ $user->cv->current_location }}</p>
                            <a type="button" href="{{ route('profile.detail', ['user'=>$user]) }}" class="btn btn-info">View Profile</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
