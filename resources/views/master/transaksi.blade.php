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
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table>
                <tr>
                  <td>
                    <label for="date">Date</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="date" name="" value="<?=date('Y-m-d')?>" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="user">Kasir</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="" value="" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top">
                    <label for="pelanggan">Pelanggan</label>
                  </td>
                  <td>
                    <div>
                      <select id="pemasok" class="form-control">
                        <option value="">Umum</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="barcode">Barcode</label>
                  </td>
                  <td>
                    <div class="form-group input-group">
                      <input type="hidden" name="">
                      <input type="hidden" name="">
                      <input type="hidden" name="">
                      <input type="text" name="" class="form-control" autofocus>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                      
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">
                    <label for="qty">QTY                  
                    </label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" value="1" min="1" class="form-control">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <div>
                      <button type="button" class="btn btn-primary">
                        <i class="fa fa-cart-plus">Add</i>
                        
                      </button>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <div align="right">
                <h4>Invoice <b><span>MP1909250001</span></b></h4>
                <h1><b><span style="font-size: 50 px">0</span></b></h1>
              </div>
            </div>
          </div>
        </div>    <!-- /.card -->
      </div>

<br>

      <div class="row">
        <div class="col-lg-12">
          <div class="box box-widget">
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th width="10%">Discount Item</th>
                    <th width="15%">Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="9" class="text-center">Tidak ada item</td>
                  </tr>
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="sub_total">Sub Total</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" class="form-control" name="" readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">
                    <label for="discount">Discount</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" value="0" min="0" name="" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">
                    <label for="grand-total">Grand Total</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" class="form-control" name="" readonly>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top; width: 30%">
                    <label for="cash">Cash</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" value="0" min="0" class="form-control" name="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;">
                    <label for="change">Change</label>
                  </td>
                  <td>
                    <div>
                      <input type="number" class="form-control" name="" readonly>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align: top">
                    <label for="note">Note</label>
                  </td>
                  <td>
                    <div>
                      <textarea rows="3" class="form-control"></textarea>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div>
            <button class="btn btn-flat btn-warning">
              <i class="fa fa-refresh"></i> Cancel
            </button><br><br>
            <button id="process_payment" class="btn btn-flat btn-lg btn-success">
              <i class="fa fa-paper -plane-o"></i> Process Payment
            </button>
          </div>
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>