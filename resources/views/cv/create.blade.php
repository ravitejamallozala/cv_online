@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your CV</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('cv.update', ['user'=>Auth::user()->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="work_exp" class="col-md-4 col-form-label text-md-right">Work
                                    Experience </label>

                                <div class="col-md-6">
                                    <textarea id="work_exp" type="text"
                                              class="form-control @error('work_exp') is-invalid @enderror"
                                              name="work_exp"
                                              value=" {{ $user->name ?? '' }}"
{{--                                              @if (is_null($user->cv))--}}
{{--                                                  value="{{ old('work_exp') }}"--}}
{{--                                              @else--}}
{{--                                                  value="{{ $user->cv->work_exp }}"--}}
{{--                                              @endif--}}
                                                  autocomplete="work_exp"
                                              autofocus></textarea>

                                    @error('work_exp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="skills" class="col-md-4 col-form-label text-md-right">Skills</label>

                                <div class="col-md-6">
                                    <input id="skills" type="text" data-role="tagsinput"
                                           class="form-control" name="skills" placeholder="Enter comma separated values"
                                           value="{{ old('skills') }}">

                                    @error('skills')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="current_location" class="col-md-4 col-form-label text-md-right">Current
                                    Location</label>

                                <div class="col-md-6">
                                    <input id="current_location" type="text"
                                           class="form-control @error('current_location') is-invalid @enderror"
                                           name="current_location" value="{{ old('current_location') }}"
                                           autocomplete="current_location">

                                    @error('current_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="education" class="col-md-4 col-form-label text-md-right">Education</label>

                                <div class="col-md-6">
                                    <input id="education" type="text"
                                           class="form-control @error('education') is-invalid @enderror"
                                           name="education" value="{{ old('education') }}" autocomplete="education">

                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="year_of_grad" class="col-md-4 col-form-label text-md-right">Year of
                                    Graduation</label>

                                <div class="col-md-6">
                                    <input id="year_of_grad" type="text"
                                           class="form-control @error('year_of_grad') is-invalid @enderror"
                                           name="year_of_grad" value="{{ old('year_of_grad') }}"
                                           autocomplete="year_of_grad">

                                    @error('year_of_grad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="projects" class="col-md-4 col-form-label text-md-right">Project
                                    Details</label>

                                <div class="col-md-6">
                                    <textarea id="projects" type="text"
                                              class="form-control @error('projects') is-invalid @enderror"
                                              name="projects" value="{{ old('projects') }}"
                                              autocomplete="projects"> </textarea>

                                    @error('projects')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Cv
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
