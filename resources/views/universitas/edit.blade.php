@extends('layout.main')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit universitas</h3> <br>
                    <a href="/universitas" class="btn btn-danger mb-3">Back</a>
                </div>
                <div class="card-body">
                    <form action="/universitas/{{ $universitas->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama_universitas">universitas Name</label>
                            <input type="text" class="form-control" name="nama_universitas" value="{{ $universitas->nama_universitas }}" placeholder="Enter universitas name">
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat universtas</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $universitas->alamat }}" placeholder="Enter universitas description">
                          </div>
                          <div class="mb-3">
                            <label for="program_id" class="form-label">program</label>
                            <select class="form-select  @error('program') is-invalid @enderror" name="program_id">
                                @foreach ($program as $prog )
                                    @if ($universitas->program_id == $prog->id)
                                        <option value="{{ $prog->id }}" selected>{{ $prog->nama_program }}</option>
                                    @else
                                        <option value="{{ $prog->id }}" >{{ $prog->nama_program }}</option>
                                    @endif         
                                @endforeach
                            </select>
                            @error('program')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
          </div><!-- /.col --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- /.content -->
  </div>
@endsection