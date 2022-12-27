<!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item"><a href="{{URL::asset('/pemasok')}}">Back</a></li>
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
                <h3 class="card-title">Form Input</h3>
              </div>
              <div class="card-body">

              <form method="post" action="<?=URL::to('simpanpemasok') ?>">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- agar nanti tidak mudah disusupi hacker saat input form-->
                
                <div class="form-group">
                  <label>Kode Pemasok:</label>
                  <input type="text" name="kode" class="form-control" id="exampleInputEmail1" placeholder="Kode Pemasok" class="form-control" required data-validation-required-message="Please enter your Code.">
                </div>
                <div class="form-group">
                  <label>Nama Pemasok:</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Pemasok" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>Alamat Pemasok:</label>
                  <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat Pemasok" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>No. Telp :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="notelp" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask class="form-control" required data-validation-required-message="Please enter your name.">
                  </div>
                </div>
                  <div class="form-group">
                  <label>Nama Pimpinan:</label>
                  <input type="text" name="namapimpinan" class="form-control" id="exampleInputEmail1" placeholder="Nama Pimpinan" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>
                <div class="form-group">
                  <label>Nama Admin:</label>
                  <input type="text" name="namaadmin" class="form-control" id="exampleInputEmail1" placeholder="Nama Admin" class="form-control" required data-validation-required-message="Please enter your name.">
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