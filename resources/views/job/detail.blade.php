@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card text-left w-75">
                <div class="card-header text-center ">
                    <h2>{{ $user->job->company_name }}</h2>
                </div>
                <div class="card-body">
                    @if((!is_null($user->job)))
                        <h5 class="card-title"><b>Job Title: </b> {{ $user->job->title }}</h5>
                        <p class="card-text"><b>Company Name: </b> {{ $user->job->company_name }}</p>
                        <p class="card-text"><b>Job Description: </b> {{ $user->job->description }}</p>
                        <p class="card-text"><b>Job Location: </b> {{ $user->job->city  }}</p>
                        <p class="card-text"><b>Job Type: </b> {{ $user->job->type  }}</p>
                        <p class="card-text"><b>Salary Details: </b> {{ $user->job->salary ?? 'N/A' }} Per hour</p>

                        @if((!is_null($user->job->skills)))
                            <b>Skills: </b>
                            @foreach($user->job->skills as $skill)
                                <span class="badge bg-secondary badge-primary"><h5 class="m-1">{{ $skill->name }}</h5></span>
                            @endforeach
                        @endif
                        <p class="card-text pt-2"><b>Posted on: </b> {{ $user->job->creation_date  }}</p>
                        <p class="card-text"><b>Expired on: </b> {{ $user->job->expiry_date  }}</p>
                    @else
                    <p class="card-text"><b>Info: </b> Not Available</p>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('job.getall') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
