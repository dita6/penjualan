<?php
//dd($datapel);
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$judul}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
              </div>
              <div class="card-body">

              <form method="post" action="<?=URL::to('simpanpelangganedit') ?>">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- agar nanti tidak mudah disusupi hacker saat input form-->
                <input type="hidden" name="id" value="{{$datapel->id}}">
                
                <div class="form-group">
                  <label>Kode Pelanggan:</label>
                  <input type="text" name="kode" class="form-control" id="exampleInputEmail1" value="{{isset($datapel->kode) ? $datapel->kode : ''}}" class="form-control" required data-validation-required-message="Please enter your Code.">
                </div>
                <div class="form-group">
                  <label>Nama Pelanggan:</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{$datapel->nama}}" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>Alamat Pelanggan:</label>
                  <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$datapel->alamat}}" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>No. Telp :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telp" class="form-control" value="{{$datapel->telp}}" required data-validation-required-message="Please enter your name.">
                  </div>
                </div>
                  <div class="form-group">
                  <label>Nama Pimpinan:</label>
                  <input type="text" name="namapimpinan" class="form-control" id="exampleInputEmail1" value="{{$datapel->namapimpinan}}" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>Nama Admin:</label>
                  <input type="text" name="namaadmin" class="form-control" id="exampleInputEmail1" value="{{$datapel->namaadmin}}" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-block btn-success btn-sm"><i class="fas fa-save"> SIMPAN</i> </button> 
                </div>
              </form>



                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col (left) -->
          

          
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->