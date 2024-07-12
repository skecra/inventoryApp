@extends('layouts.main')

@section('page_title', 'Add new employee')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Add new employee
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/users" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name_input" class="form-control">
                                @error('name')
                                    {{ $message }}
                                  @enderror
                            </div>
                            <div class="col-4">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email_input" class="form-control">
                                @error('email')
                                    {{ $message }}
                                 @enderror
                            </div>
                            <div class="col-4">
                                <label for="name">Password</label>
                                <input type="text" name="password" id="password_input" class="form-control">
                                @error('password')
                                    {{ $message }}
                                 @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="department">Department</label>
                                <select name="department_id" class="form-control" onchange="fillPositions()" id="department_id">
                                    <option selected disabled value="">--select department--</option>
                                    @foreach($departments as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="position_id">Position</label>
                                <select name="position_id" class="form-control" id="position_id">
                                    <option disabled value="">--select position--</option>
                                </select>
                                @error('position_id')
                                    {{ $message }}
                            @enderror
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
@endsection
