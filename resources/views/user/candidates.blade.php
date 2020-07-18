@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline col-md-6 my-4 my-lg-0 pb-2" method="post" action="{{ route('profile.search') }}">
            @csrf
            <span class="font-weight-bold pr-5">Filter Candidate </span>
            <input name='data' class="form-control mr-sm-2" type="search" placeholder="Comma separated Name/Skills" aria-label="Search">
            {{--            <a href="{{ route('job.getall') }}" class="btn btn-primary">Back</a>--}}
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="card-header row justify-content-center "><h1> All Potential Candidates </h1></div>
        <div class="row pt-3">
            <div class="card-deck">
                @foreach ($users as $user)

                    @if(!is_null($user->cv))
                    <div class="card  border-primary mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold"> {{ $user->name }}</h3>
                            <p class="card-text"><b>Education: </b>{{ $user->cv->education }}</p>
                            <p class="card-text"><b>Work Exp: </b>{{ $user->cv->work_exp }}</p>
                            <p class="card-text"><b>Location: </b>{{ $user->cv->current_location }}</p>
                            <a type="button" href="{{ route('profile.detail', ['user'=>$user]) }}" class="btn btn-info">View
                                Profile</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
