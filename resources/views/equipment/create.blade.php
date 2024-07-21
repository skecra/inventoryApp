@extends('layouts.main')

@section('page_title', 'Add new equipment')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Add new Equipment
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/equipment" method="POST">
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
                                <label for="equipment_category_id">Category</label>
                                <select name="equipment_category_id" class="form-control  @error('equipment_category_id') is-invalid @endif" id="">
                                    <option selected disabled value="">--choose category--</option>
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('equipment_category_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="name_input" class="form-control @error('quantity') is-invalid @endif">
                                <div class="invalid-feedback">
                                    @error('quantity')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="quantity">Description</label>
                                <textarea name="description" id="" class="form-control" cols="10" rows="2"></textarea>
                                <div class="invalid-feedback">
                                    @error('quantity')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
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

