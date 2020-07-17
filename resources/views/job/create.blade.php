@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Job Offer</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('job.update', ['user'=>Auth::user()->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Job Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ $user->job->title ?? old('title') }}"
                                           autocomplete="title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description"
                                              autocomplete="description"
                                              autofocus><?php echo $user->job->description ?? old('description') ?></textarea>

                                    @error('description')
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
                                           @if(!is_null($user->job))
                                           value="{{ implode(", ",$user->job->skills->pluck('name')->toArray())  }}"
                                           @else
                                           value="{{ old  ('skills') }}"
                                        @endif
                                    >
                                    @error('skills')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="salary" class="col-md-4 col-form-label text-md-right">Salary</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text"
                                           class="form-control @error('salary') is-invalid @enderror"
                                           name="salary"
                                           value="{{ $user->job->salary ?? old('salary') }}"
                                           autocomplete="salary">

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Job type</label>

                                <div class="col-md-6">
                                    <input id="type" type="text"
                                           class="form-control @error('type') is-invalid @enderror"
                                           name="type" value="{{ $user->job->type ?? old('type') }}"
                                           autocomplete="type">

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Company
                                    Name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text"
                                           class="form-control @error('company_name') is-invalid @enderror"
                                           name="company_name"
                                           value="{{ $user->job->company_name ?? old('company_name') }}"
                                           autocomplete="company_name">

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           name="city"
                                           value="{{ $user->job->city ?? old('city') }}"
                                           autocomplete="city">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="expiry_date" class="col-md-4 col-form-label text-md-right">expiry_date</label>

                                <div class="col-md-6">
                                    <input id="expiry_date" type="text"
                                           class="form-control @error('expiry_date') is-invalid @enderror"
                                           name="expiry_date"
                                           value="{{ $user->job->expiry_date ?? old('expiry_date') }}"
                                           autocomplete="expiry_date">

                                    @error('expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="creation_date" class="col-md-4 col-form-label text-md-right">creation_date</label>

                                <div class="col-md-6">
                                    <input id="creation_date" type="text"
                                           class="form-control @error('creation_date') is-invalid @enderror"
                                           name="creation_date"
                                           value="{{ $user->job->creation_date ?? old('creation_date') }}"
                                           autocomplete="creation_date">

                                    @error('creation_date')
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
                                        Update Job Offer
                                    </button>
                                    <a data-method="delete"  href="{{ route('job.destroy', ['user'=>Auth::user()->id]) }}" id="del_btn" class="ravi btn btn-danger">
                                        Delete Job
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
