@extends('layouts.main')

@section('page_title', 'Edit employee')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Edit employee
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/users/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name</label>
                                <input value="{{$user->name}}" type="text" name="name" id="name_input" class="form-control @error('name') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="email">Email</label>
                                <input value="{{$user->email}}" type="text" name="email" id="email_input" class="form-control @error('email') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="name">Password</label>
                                <input type="text" disabled name="password" id="password_input" class="form-control @error('password') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="department">Department</label>
                                <select name="department_id" class="form-control" onchange="fillPositions()" id="department_id">
                                    <option disabled value="">--select department--</option>
                                    @foreach($departments as $d)
                                        <option @if($department->id == $d->id) selected @endif value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="position_id">Position</label>
                                <select name="position_id" class="form-control @error('position_id') is-invalid @endif" id="position_id">
                                    <option disabled value="">--select position--</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('position_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>




                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

@section('additional_scripts')
    <script src="{{asset('js/users/create.js')}}"></script>
    <script>
        fillPositions({{$user->position_id}})
    </script>
@endsection
