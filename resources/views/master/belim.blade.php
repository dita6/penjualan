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
              <li class="breadcrumb-item active"><a class="green" href="{{URL::asset('/tambahbelim')}}" title="Tambah Data"><i class="fas fa-plus-circle"> Tambah Data</i></a></li>
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
              <h3 class="card-title">Data Obat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No. Bukti</th>
                  <th>Tanggal </th>
                  <th>ID Pemasok</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                  $no=1;
                  foreach ($vardata as $key ) { ?>
                <tr>

                  <td>{{$no++}}</td>
                  <td>{{$key ->nobukti}}</td>
                  <td>{{$key ->tgl}}</td>
                  <td>{{$key ->idpemasok}}</td>
                  <td>{{$key ->ket}}</td>
                  <td>
                    <a class="green" href="{{ URL::asset('/delbelim/'.$key->id) }}"
                      title="Delete Data"onclick="return confirm('Anda yakin ingin hapus?')">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="green" href="{{ URL::asset('/editbelim/'.$key->id) }}"
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