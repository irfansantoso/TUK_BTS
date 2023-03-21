@extends('template')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body" style="text-align: center">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-8">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('CKD'); }}</h3>

                  <p>CKD</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-8">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('USP'); }}<sup style="font-size: 20px"></sup></h3>

                  <p>USP</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-8">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>0</h3>

                  <p>HKU</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
          </div>
          <!-- /.row -->

          <!-- <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">$18,230.00</span>
                  <span>Sales Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                  </span>
                  <span class="text-muted">Since last month</span>
                </p>
              </div>
               /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
              </div>

            </div>
          </div>
          <!-- /.card --> 
        </div>
        <!-- /.card-body -->

    </div>
      <!-- /.card -->
@endsection