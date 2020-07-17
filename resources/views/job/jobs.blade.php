@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card-header row justify-content-center "><h1> List of Jobs Available </h1></div>
        <div class="row pt-3">
            <div class="card-deck">
                @foreach ($users as $user)
                    @if(!is_null($user->job))
                        <div class="card  border-primary mb-3" style="width: 18rem;">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold"> {{ $user->job->title }}</h3>
                                <p class="card-text"><b>Company: </b>{{ $user->job->company_name }}</p>
                                <p class="card-text"><b>description: </b>{{ $user->job->description }}</p>
                                <a type="button" href="{{ route('job.detail', ['user'=>$user]) }}" class="btn btn-info">View
                                    Profile</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
