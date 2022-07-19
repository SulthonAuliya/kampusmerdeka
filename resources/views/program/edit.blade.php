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
                    <h3 class="card-title">Edit program</h3> <br>
                    <a href="/program" class="btn btn-danger mb-3">Back</a>
                </div>
                <div class="card-body">
                    <form action="/program/{{ $program->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama_program">Program Name</label>
                            <input type="text" class="form-control" name="nama_program" value="{{ $program->nama_program }}" placeholder="Enter program name">
                          </div>
                          <div class="form-group">
                            <label for="description">Program description</label>
                            <input type="text" class="form-control" name="description" value="{{ $program->description }}" placeholder="Enter program description">
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