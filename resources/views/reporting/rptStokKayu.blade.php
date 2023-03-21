@extends('template')
@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('rptStokKayu.rpt') }}" method="POST">
     @csrf        
    <div class="card-body">          
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>HPH</label><br>
              <select class="form-control" name="hph" id="hph" style="width: 100%;">
                  <option value="0" selected="selected">-Pilih-</option>
                  <option value="CKD">CKD</option>
                  <option value="USP">USP</option>
                  <option value="HKU">HKU</option>
                  <option value="ALL">GABUNGAN</option>
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal</label>
              <input type="text" class="form-control" name="tgl_laporan" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
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

@if(session('hph') == "CKD")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. CKD</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ session('thn_produksi') }}</h4>
    <h6>Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN CKD</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 21</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>              
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Meranti Kuning</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif          
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Merah</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Putih</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Batu</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Keruing</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Bangkirai</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Pelepek</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Kapur</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Nyatoh</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Mersawa</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Rimba Campuran</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') +             
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900'); }}</td>
          @else
          <td>-</td>
          @endif              
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. CKD</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ session('thn_produksi') }}</h4> 
    <h5>Per Tgl : {{ session('tgl_laporan') }}</h5>    
    <table id="tiga" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN CKD</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 21</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>          
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = Session::get('getSelCkd'); 

          $sum_tpnQty = 0;
          $sum_tpnVol = 0;
          $sum_tpk21Qty = 0;
          $sum_tpk21Vol = 0;
          $sum_tpkLbdQty = 0;
          $sum_tpkLbdVol = 0;
          $sum_tpkLbaQty = 0;
          $sum_tpkLbaVol = 0;
          $sum_tpkTmpQty = 0;
          $sum_tpkTmpVol = 0;
          $sum_tpkTynQty = 0;
          $sum_tpkTynVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td>{{ $jsnx['thnprod'] }}</td>
            <td>{{ $jsnx['tpnQty'] }}</td>
            <td>{{ round($jsnx['tpnVol']) }}</td>
            <td>{{ $jsnx['tpk21Qty'] }}</td>
            <td>{{ round($jsnx['tpk21Vol']) }}</td>
            <td>{{ $jsnx['tpkLbdQty'] }}</td>
            <td>{{ round($jsnx['tpkLbdVol']) }}</td>
            <td>{{ $jsnx['tpkLbaQty'] }}</td>
            <td>{{ round($jsnx['tpkLbaVol']) }}</td>
            <td>{{ $jsnx['tpkTmpQty'] }}</td>
            <td>{{ round($jsnx['tpkTmpVol']) }}</td>
            <td>{{ $jsnx['tpkTynQty'] }}</td>
            <td>{{ round($jsnx['tpkTynVol']) }}</td>
            <td>{{ $jsnx['totalQty'] }}</td>
            <td>{{ round($jsnx['totalVol']) }}</td>
        </tr>
        @php
          $sum_tpnQty += $jsnx['tpnQty'];
          $sum_tpnVol += $jsnx['tpnVol'];
          $sum_tpk21Qty += $jsnx['tpk21Qty'];
          $sum_tpk21Vol += $jsnx['tpk21Vol'];
          $sum_tpkLbdQty += $jsnx['tpkLbdQty'];
          $sum_tpkLbdVol += $jsnx['tpkLbdVol'];
          $sum_tpkLbaQty += $jsnx['tpkLbaQty'];
          $sum_tpkLbaVol += $jsnx['tpkLbaVol'];
          $sum_tpkTmpQty += $jsnx['tpkTmpQty'];
          $sum_tpkTmpVol += $jsnx['tpkTmpVol'];
          $sum_tpkTynQty += $jsnx['tpkTynQty'];
          $sum_tpkTynVol += $jsnx['tpkTynVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color:#C0c1c0;">Grand Total</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpnQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpnVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpk21Qty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpk21Vol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbdVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbaQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbaVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTmpQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTmpVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTynQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTynVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_totalVol) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@elseif(session('hph') == "USP")

<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. USP</h2>
    <h4>Stock Kayu Tahun {{ session('thn_produksi') }}</h4>
    <h6>Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN USP</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK MADI DRT</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPK MADI AIR</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK 31</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPK 24</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Meranti Kuning</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Merah</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Putih</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Batu</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Keruing</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Bangkirai</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Pelepek</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Kapur</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Nyatoh</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Mersawa</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Rimba Campuran</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. USP</h2>
    <h4>Stock Kayu Tahun {{ session('thn_produksi') }}</h4> 
    <h5>Per Tgl : {{ session('tgl_laporan') }}</h5>    
    <table id="" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN USP</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK GABUNGAN</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>                    
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Meranti Kuning</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif          
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Merah</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Putih</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Batu</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Keruing</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Bangkirai</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Pelepek</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Kapur</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Nyatoh</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Mersawa</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Rimba Campuran</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif          
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0) 
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0120') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0100') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0101') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0102') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0120') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0200') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0300') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0301') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0400') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0500') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0600') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn(session('hph'),session('tgl_laporan'),'002','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'610','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'611','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'603','0900') +
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'605','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. USP</h2>
    <h4>Stock Kayu Tahun {{ session('thn_produksi') }}</h4> 
    <h5>Per Tgl : {{ session('tgl_laporan') }}</h5>    
    <table id="tiga" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN USP</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK GABUNGAN</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>          
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>      
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>    
          <th>Btg</th>
          <th>M3</th>          
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = Session::get('getSel'); 

          $sum_tpnQty = 0;
          $sum_tpnVol = 0;
          $sum_tpkGabQty = 0;
          $sum_tpkGabVol = 0;
          $sum_tpkLbdQty = 0;
          $sum_tpkLbdVol = 0;
          $sum_tpkLbaQty = 0;
          $sum_tpkLbaVol = 0;
          $sum_tpkTmpQty = 0;
          $sum_tpkTmpVol = 0;
          $sum_tpkTynQty = 0;
          $sum_tpkTynVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td>{{ $jsnx['thnprod'] }}</td>
            <td>{{ $jsnx['tpnQty'] }}</td>
            <td>{{ round($jsnx['tpnVol']) }}</td>
            <td>{{ $jsnx['tpkGabQty'] }}</td>
            <td>{{ round($jsnx['tpkGabVol']) }}</td>
            <td>{{ $jsnx['tpkLbdQty'] }}</td>
            <td>{{ round($jsnx['tpkLbdVol']) }}</td>
            <td>{{ $jsnx['tpkLbaQty'] }}</td>
            <td>{{ round($jsnx['tpkLbaVol']) }}</td>
            <td>{{ $jsnx['tpkTmpQty'] }}</td>
            <td>{{ round($jsnx['tpkTmpVol']) }}</td>
            <td>{{ $jsnx['tpkTynQty'] }}</td>
            <td>{{ round($jsnx['tpkTynVol']) }}</td>
            <td>{{ $jsnx['totalQty'] }}</td>
            <td>{{ round($jsnx['totalVol']) }}</td>
        </tr>
        @php
          $sum_tpnQty += $jsnx['tpnQty'];
          $sum_tpnVol += $jsnx['tpnVol'];
          $sum_tpkGabQty += $jsnx['tpkGabQty'];
          $sum_tpkGabVol += $jsnx['tpkGabVol'];
          $sum_tpkLbdQty += $jsnx['tpkLbdQty'];
          $sum_tpkLbdVol += $jsnx['tpkLbdVol'];
          $sum_tpkLbaQty += $jsnx['tpkLbaQty'];
          $sum_tpkLbaVol += $jsnx['tpkLbaVol'];
          $sum_tpkTmpQty += $jsnx['tpkTmpQty'];
          $sum_tpkTmpVol += $jsnx['tpkTmpVol'];
          $sum_tpkTynQty += $jsnx['tpkTynQty'];
          $sum_tpkTynVol += $jsnx['tpkTynVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color:#C0c1c0;">Grand Total</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpnQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpnVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkGabQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkGabVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbdVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbaQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbaVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTmpQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTmpVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTynQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTynVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_totalVol) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@elseif(session('hph') == "ALL")
<div class="card">
  <!-- /.card-header -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BUMI TRIKAMA SEMPURNA</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ session('thn_produksi') }}</h4>
    <h6>Per Tgl : {{ session('tgl_laporan') }}</h6>
    <table id="" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN USP+CKD</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK GABUNGAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>              
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Meranti Kuning</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +              
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Merah</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Putih</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +              
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +            
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Meranti Batu</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Keruing</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +            
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Bangkirai</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +              
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +            
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td>Pelepek</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +              
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +            
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Kapur</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +              
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +              
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Nyatoh</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +           
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +              
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Mersawa</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +             
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +           
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr>
          <td>Rimba Campuran</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900')!= 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>{{ App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
        <tr style="background-color:#Dcdedb;">
          <td style="background-color:#C0c1c0;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900'); }}</td>
          @else
          <td>-</td>
          @endif              
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') + App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0120') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900') != 0)
          <td>
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0100') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0100') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0101') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0101') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0102') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0102') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0120') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0120') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0200') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0200') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0300') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0300') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0301') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0301') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0400') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0400') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0500') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0500') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0600') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0600') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpnAll(session('hph'),session('tgl_laporan'),'001-002','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'609-610-611-603-605','0900') +               
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'710','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'711','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'720','0900') + 
          App\Http\Controllers\UserController::getVolKayuAll(session('hph'),session('tgl_laporan'),'740','0900'); }}</td>
          @else
          <td>-</td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-body" style="height:500px;overflow:auto;">
    <h2>PT. BUMI TRIKAMA SEMPURNA</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ session('thn_produksi') }}</h4> 
    <h5>Per Tgl : {{ session('tgl_laporan') }}</h5>    
    <table id="tiga" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TPN USP+CKD</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">TPK</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#Dcdedb;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>          
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
          <th>Btg</th>
          <th>M3</th>
          <th style="background-color:#Dcdedb;">Btg</th>
          <th style="background-color:#Dcdedb;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = Session::get('getSelGab'); 

          $sum_tpnQty = 0;
          $sum_tpnVol = 0;
          $sum_tpkGabQty = 0;
          $sum_tpkGabVol = 0;
          $sum_tpkLbdQty = 0;
          $sum_tpkLbdVol = 0;
          $sum_tpkLbaQty = 0;
          $sum_tpkLbaVol = 0;
          $sum_tpkTmpQty = 0;
          $sum_tpkTmpVol = 0;
          $sum_tpkTynQty = 0;
          $sum_tpkTynVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)
        <tr>              
            <td>Total kayu USP+CKD {{ $jsnx['thnprod'] }}</td>
            <td>{{ $jsnx['tpnQty'] }}</td>
            <td>{{ round($jsnx['tpnVol']) }}</td>
            <td>{{ $jsnx['tpkGabQty'] }}</td>
            <td>{{ round($jsnx['tpkGabVol']) }}</td>
            <td>{{ $jsnx['tpkLbdQty'] }}</td>
            <td>{{ round($jsnx['tpkLbdVol']) }}</td>
            <td>{{ $jsnx['tpkLbaQty'] }}</td>
            <td>{{ round($jsnx['tpkLbaVol']) }}</td>
            <td>{{ $jsnx['tpkTmpQty'] }}</td>
            <td>{{ round($jsnx['tpkTmpVol']) }}</td>
            <td>{{ $jsnx['tpkTynQty'] }}</td>
            <td>{{ round($jsnx['tpkTynVol']) }}</td>
            <td>{{ $jsnx['totalQty'] }}</td>
            <td>{{ round($jsnx['totalVol']) }}</td>
        </tr>
        @php
          $sum_tpnQty += $jsnx['tpnQty'];
          $sum_tpnVol += $jsnx['tpnVol'];
          $sum_tpkGabQty += $jsnx['tpkGabQty'];
          $sum_tpkGabVol += $jsnx['tpkGabVol'];
          $sum_tpkLbdQty += $jsnx['tpkLbdQty'];
          $sum_tpkLbdVol += $jsnx['tpkLbdVol'];
          $sum_tpkLbaQty += $jsnx['tpkLbaQty'];
          $sum_tpkLbaVol += $jsnx['tpkLbaVol'];
          $sum_tpkTmpQty += $jsnx['tpkTmpQty'];
          $sum_tpkTmpVol += $jsnx['tpkTmpVol'];
          $sum_tpkTynQty += $jsnx['tpkTynQty'];
          $sum_tpkTynVol += $jsnx['tpkTynVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color:#C0c1c0;">Grand Total</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpnQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpnVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkGabQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkGabVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbdQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbdVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkLbaQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkLbaVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTmpQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTmpVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_tpkTynQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_tpkTynVol) }}</th>
          <th style="background-color: #Dcdedb;">{{ $sum_totalQty }}</th>
          <th style="background-color: #Dcdedb;">{{ round($sum_totalVol) }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@elseif(session('hph') == "HKU")
  No Data Found
@endif
    
@endsection