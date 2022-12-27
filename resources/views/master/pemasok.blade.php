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
              <li class="breadcrumb-item active"><a class="green" href="{{URL::asset('/tambahpemasok')}}" title="Tambah Data"><i class="fas fa-plus-circle"> Tambah Data</i></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pemasok</th>
                  <th>Nama pemasok</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Nama Pimpinan</th>
                  <th>Nama Admin</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                  $no=1;
                  foreach ($vardata as $key ) { ?>
                <tr>

                  <td>{{$no++}}</td>
                  <td>{{$key ->kode}}</td>
                  <td>{{$key ->nama}}</td>
                  <td>{{$key ->alamat}}</td>
                  <td>{{$key ->telp}}</td>
                  <td>{{$key ->namapimpinan}}</td>
                  <td>{{$key ->namaadmin}}</td>
                  <td>
                    <a class="green" href="{{ URL::asset('/delpemasok/'.$key->id) }}"
                      title="Delete Data"onclick="return confirm('Anda yakin ingin hapus?')">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="green" href="{{ URL::asset('/editpemasok/'.$key->id) }}"
                      title="Edit Data" > 
                   <i class="fas fa-edit"></i>
                    </a>

                  </td>
                 
                </tr>

              <?php } ?>
              
               
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>