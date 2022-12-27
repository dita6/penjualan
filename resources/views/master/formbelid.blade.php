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
              <li class="breadcrumb-item"><a href="{{URL::asset('/belid')}}">Back</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->

        <!-- /.card -->

        <div class="row">
          <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">MASTER</h3>
              </div>
              
              <div class="card-body">
                 <form method="post" action="<?=URL::to('simpanbeli') ?>">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                
                
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">

                  <div class="row">

                   <div class="col-sm-6">
                  <label>No. Bukti:</label>
                  <input type="text" name="nobukti" class="form-control" id="exampleInputEmail1" value="{{ isset($nobukti) ? $nobukti : '' }}" class="form-control" required data-validation-required-message="Please enter your name." >
                   </div>

                    <div class="col-sm-6">
                    <label>Nama Pemasok :</label>
                    <select name="idpemasok" id="idpemasok" value="{{ isset($idpemasok) ? $idpemasok : '' }}"
                              class="form-control select" style="width: 100%;" >
                             <?php     
                              $datapem=DB::table('pemasok')              
                                ->select('pemasok.*')                                  
                                ->get();
     
                                 foreach($datapem as $rows){
                                  if( $idpem == $rows->id ){ 
                                      echo "<option selected = 'selected' 
                                        value='".$rows->id."'>".$rows->nama."</option>";
                                        
                                  } else{ 
                                      echo "<option value='".$rows->id."'>".$rows->nama."</option>";
                                  }
                                  }
                                  ?> 
                          </select>
                   </div>
                </div>
              </div>

                 
                  <div class="form-group">
                   <label>Keterangan :</label>
                  <input type="text" name="ket" value="{{ isset($ket) ? $ket : '' }}" class="form-control" id="exampleInputEmail1" placeholder="Keterangan" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>

              </div>
              <!-- /.card-body -->
            </div>


             

          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-secondary">
               <div class="card-header">
                <h3 class="card-title">TANGGAL</h3>
              </div>
              
              <div class="card-body">
                <!-- Date range -->
                 <div class="form-group">
                 <label>Tanggal :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl"  value="{{ isset($tgl) ? $tgl : '' }}" class="form-control" required data-validation-required-message="Please enter your name." data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
          <!-- /.col (right) -->
        </div>

        <div class="col-md-12">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">DETAIL</h3>
              </div>
              
              <div class="card-body">
            
          
         <div class="form-group">
                    <div class="row">
                      <div class=" col-sm-4">
                   <label>Nama Stok :</label>
                  <select name="idstok" id="id"  value="{{ isset($idstok) ? $idstok : '' }}"
                              class="form-control select" style="width: 100%;" >
                             <?php     
                              $dataper=DB::table('persediaan')              
                                ->select('persediaan.*')                                  
                                ->get();
     
                                 foreach($dataper as $rows){
                                  if( $idper == $rows->id ){ 
                                      echo "<option selected = 'selected' 
                                        value='".$rows->id."'>".$rows->nama."</option>";
                                  } else{ 
                                      echo "<option value='".$rows->id."'>".$rows->nama."</option>";
                                  }
                                  }
                                  ?> 
                          </select>
                      </div>
                   <div class=" col-sm-2">
                   <label>Quantity:</label>
                  <input type="text" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Quantity" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>

                 <div class=" col-sm-2">
                  <label>Harga:</label>
                  <input type="text" name="hargabeli" class="form-control" id="exampleInputEmail1" placeholder="Harga" class="form-control" required data-validation-required-message="Please enter your name.">
                </div>

                <div class=" col-sm-2">
                  <label>Proses </label>
                   <button type="submit" class="btn btn-block btn-success btn-sm">Save</button>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

        
        <!-- /.row -->
          
      </div><!-- /.container-fluid -->
    </section>

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
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="green" href="{{ URL::asset('/editbelid/'.$key->nobukti) }}"
                      title="Edit Data" > 
                   <i class="fas fa-edit"></i>
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
  </div>