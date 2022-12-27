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
              <li class="breadcrumb-item active"><a class="green" href="{{URL::asset('/tambahbelid')}}" title="Tambah Data"><i class="fas fa-plus-circle"> Tambah Data</i></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <form method="post" action="<?=URL::to('simpanbeli') ?>">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">DETAIL</h3>
              </div>
              
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Stok</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th>Subtotal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  {{csrf_field()}}
                  <?php

                  $vardata=DB::table('belid')
                     ->leftjoin('persediaan', 'persediaan.id', '=', 'belid.idstok') 
                     ->select('belid.*', 'persediaan.nama as namastok')
                       
                     ->where('belid.nobukti',$nobukti)   
                      -> get();

                  $no=1; $total=0;$totaldp=0;

                      foreach($vardata as $key){
                      
                      $total=$total+ ($key->qty * $key->hargabeli) ?>

                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$key->namastok}}</td>
                    <td>{{number_format($key->qty, 0) }}</td>
                    <td>Rp. {{number_format($key->hargabeli, 2, ',', '.')}}</td>
                    <td>{{$key->ket}}</td>
                    <td>Rp. {{number_format($key->qty*$key->hargabeli, 2, ',', '.')}}</td>
      
                    <td>
                      <a class="green" href="{{ URL::asset('/delbeli/'.$key->id) }}"
                      title="Delete Data"onclick="return confirm('Anda yakin ingin hapus?')">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                    </td>
                      
                    </tr>
                     <?php } ?>
                </tbody>
               <footer>
                <tr>
                  <td colspan="5" align="right">Total</td>
                  <td align="left">Rp. {{number_format($total, 2, ',', '.')}}</td>
                </tr>
              </footer>
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
  </form>
    <!-- /.content -->
  </div>