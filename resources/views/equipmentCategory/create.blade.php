@extends('layouts.main')

@section('page_title', 'Add new category')

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

                    <form action="/equipment_categories" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name_input" class="form-control @error('name') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('name')
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
@endsection
