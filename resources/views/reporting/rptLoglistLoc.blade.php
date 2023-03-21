@extends('template')
@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptLoglistLoc.rpt') }}" method="POST">
     @csrf        
    <div class="card-body">          
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Lokasi</label><br>
              <select class="form-control" name="lokasi" id="lokasi" style="width: 100%;">
                <option value="0" selected="selected">-Pilih-</option>
                <option value="001-CKD">TPN CKD</option>
                <option value="609-CKD">--TPK 21 CKD</option>
                <option value="002-USP">TPN USP</option>
                <option value="603-USP">--TPK 31 USP</option>
                <option value="605-USP">--TPK 24 USP</option>                    
                <option value="610-USP">--TPK MADI DRT USP</option>
                <option value="611-USP">--TPK MADI AIR USP</option>
                <option value="710-CKD">LP BERE DRT CKD</option>
                <option value="710-USP">LP BERE DRT USP</option>
                <option value="711-CKD">LP BERE AIR CKD</option>
                <option value="711-USP">LP BERE AIR USP</option>
                <option value="720-GAB">TEMPUNAK</option>
                <option value="740-GAB">TAYAN</option>
              </select>
          </div>
        </div>            
        <div class="col-sm-2">
          <div class="form-group">
            <label>Jenis Laporan</label><br>
              <select class="form-control" name="jnsLap" id="jnsLap" style="width: 100%;">
                  <option value="xls">XLS</option>
                  <option value="view">VIEW</option>
              </select>
          </div>
        </div>
      </div>
    <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <button class="btn btn-info">Submit</button>
    </div>
    <!-- /.card-footer -->
  </form>              
</div>
  <!-- /.card -->

@if(Session::get('getSel') != "")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h4 style="text-align:center;">LOGLIST DI LOKASI {{ session('lokasi'); }} - {{ session('hph'); }}</h4>
    <table id="rptLogLoc" class="table table-bordered table-striped">
      <thead>
        <tr style="border-color: #000000;">
          <th>Thn Rkt</th>
          <th>No Btg</th>
          <th>Tgl Ukur</th>
          <th>Jns Kayu</th>
          <th>Chainsaw</th>
          <th>Traktor</th>
          <th>Pjg</th>
          <th>Pkl</th>
          <th>Ujg</th>
          <th>Rt2</th>
          <th>Vol</th>
          <th>Cct</th>
          <th>Pcct</th>
          <th>Petak</th>
          <th>Kelas</th>
          <th>Timbul</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = Session::get('getSel');
        @endphp

        @foreach ($getSelDt as $jsnx)
        <tr>              
          <td>{{ $jsnx['thn_rkt'] }}</td>
          <td>{{ $jsnx['no_btg'] }}</td>
          <td>{{ $jsnx['tgl_ukur'] }}</td>
          <td>{{ $jsnx['mk'] }}</td>
          <td>{{ $jsnx['mc'] }}</td>
          <td>{{ $jsnx['md'] }}</td>
          <td>{{ $jsnx['pjg'] }}</td>
          <td>{{ $jsnx['pkl'] }}</td>
          <td>{{ $jsnx['ujg'] }}</td>
          <td>{{ $jsnx['rt2'] }}</td>
          <td>{{ $jsnx['vol'] }}</td>
          <td>{{ $jsnx['cct'] }}</td>
          <td>{{ $jsnx['pcct'] }}</td>
          <td>{{ $jsnx['petak'] }}</td>
          <td>{{ $jsnx['kelas'] }}</td>
          <td>{{ $jsnx['timbul'] }}</td>
        </tr>
        @endforeach             
      </tbody>         
    </table>
    <br>        
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@else
  <div style="text-align:center;">No Data Found</div>
@endif
    
@endsection