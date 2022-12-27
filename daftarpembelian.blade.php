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
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <th>#</th>
              <th>No bukti</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telpon</th>
              <th>Total</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php
                foreach ($beliId as $index => $key) {
              ?>
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $key->nobukti }}</td>
                <td>{{ $key->tgl }}</td>
                <td>{{ $key->ket }}</td>
                <td>{{ $key->nama }}</td>
                <td>{{ $key->alamat }}</td>
                <td>{{ $key->telp }}</td>
                <td>Rp. {{ number_format($key->total, 0, ',', '.') }}</td>
                <td>
                  <form action="{{ URL::asset('/hapuspembelian/' . $key->nobukti ) }}" method="post" class="d-inline border-0">
                    {{ csrf_field() }}
                    <button type="submit" class="green" title="Delete Data">
                      <i class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></i>
                    </button>
                  </form>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>