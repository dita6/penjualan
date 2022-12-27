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
      <form method="POST" action="{{ URL::asset('/simpanpembelian') }}">
        <div class="row">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Master</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                  <div class="col-md-6">
                    <label>No Bukti</label>
                    <input type="text" value="{{ $nobuk }}" name="nobuk" class="form-control" placeholder="Nomor Bukti">
                  </div>
                  <div class="col-sm-6">
                    <label>Nama Pemasok</label>
                    <select name="idpem" id="idpem" class="form-control select2" style="width: 100%;">
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
                  <div class="col-md-12">
                    <label>Keterangan</label>
                    <textarea name="ket" id="" cols="30" rows="1" class="form-control" placeholder="Ketetangan"
                      required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Master</h3>
              </div>
              <div class="card-body">
                <!-- Date range -->
                <div class="form-group">
                  <label>Tanggal:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="tanggal" class="form-control float">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Detail</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nama Stok</label>
                        <select name="id_stok" id="id_stok" class="form-control select2" style="width: 100%;">
                          <?php     
                            $datapem=DB::table('persediaan')              
                              ->select('persediaan.*')                                  
                              ->get();
    
                                foreach($datapem as $rows){
                                  if( $idpem == $rows->id_persediaan ){ 
                                      echo "<option selected = 'selected' 
                                        value='".$rows->id_persediaan."'>".$rows->nama."</option>";
                                  } else{ 
                                      echo "<option value='".$rows->id_persediaan."'>".$rows->nama."</option>";
                                  }
                                }
                              ?>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <label>Qty</label>
                        <input type="text" name="qty" class="form-control" placeholder="Qty" required>
                      </div>

                      <div class="col-md-2">
                        <label>Harga</label>
                        <input type="text" name="hrgjual" class="form-control" placeholder="Harga" required>
                      </div>

                      <div class="col-md-2">
                        <label>Proses</label>
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Detail</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>#</th>
                  <th>No bukti</th>
                  <th>Qty</th>
                  <th>Harga jual</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($beliId as $index => $key) {
                  ?>
                  <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$key->nobuk}}</td>
                    <td>{{$key->qty}}</td>
                    <td>Rp. {{number_format($key->hrgjual, 2, ',', '.')}}</td>
                    <td>{{$key->ket}}</td>
                    <td>{{ $key->tanggal }}</td>
                    <td>
                      <a class="green" href="" title="Delete Data">
                        <i class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></i>
                        <i class="btn btn-sm btn-secondary"><i class="fa fa-pencil-alt"></i></i>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>