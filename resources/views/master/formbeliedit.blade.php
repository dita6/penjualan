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

              <form method="post" action="<?=URL::to('simpanbeliedit') ?>">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- agar nanti tidak mudah disusupi hacker saat input form-->
                <input type="hidden" name="id" value="{{$databeli->nobukti}}">
                
                <div class="form-group">
                  <label>No. Bukti:</label>
                  <input type="text" name="nobukti" class="form-control" id="exampleInputEmail1" value="{{isset($databeli->nobukti) ? $databeli->nobukti : ''}}" class="form-control" required data-validation-required-message="Please enter your Code.">
                </div>

                <div class="form-group">
                 <label>Tanggal :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl"  value="{{$databeli->tgl}}" class="form-control" required data-validation-required-message="Please enter your name." data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >
                  </div>
                </div>

                <div class="form-group">
                    <label>Nama Pemasok :</label>
                    <select name="idpemasok" id="idpemasok" value="{{$databeli->idpemasok}}"
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

                <div class="form-group">
                  <label>Keterangan:</label>
                  <input type="text" name="ket" class="form-control" id="exampleInputEmail1" value="{{$databeli->ket}}" class="form-control" required data-validation-required-message="Please enter your name.">
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