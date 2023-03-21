@extends('template')
@section('content')
<!-- Content Header (Page header) -->
{{-- <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>@yield('title', $title)</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">@yield('title', $title)</a></li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section> --}}
    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('chainsaw.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_chainsaw" name="kode_chainsaw" placeholder="Kode Chainsaw" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="Nama Chainsaw" class="col-sm-2 col-form-label">Nama Chainsaw</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_chainsaw" name="nama_chainsaw" placeholder="Nama Chainsaw">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button class="btn btn-info">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode Chainsaw</th>
            <th>Nama Chainsaw</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($chainsaw as $etr)
            <tr>              
                <td>{{ $etr->kode_chainsaw }}</td>
                <td>{{ $etr->nama_chainsaw }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Chainsaw</th>
            <th>Nama Chainsaw</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection