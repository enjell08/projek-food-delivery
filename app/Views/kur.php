<main id="main" class="main">

  <div class="pagetitle">
    <h1>Table Kurir</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Kurir</h5>
            <a href="<?= base_url('home/tkur') ?>" class="btn btn-success">+Tambah</a>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Nama</th>
                  <th >Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th >No Handphone</th>
                  <th >Email</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $ms=1;
                foreach ($takdirestui as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $ms++ ?></td>
                    <td><?= $value->nama_kurir?></td>
                    <td><?= $value->jenis_kelamin?></td>
                    <td><?= $value->alamat?></td>
                    <td><?= $value->no_handphone ?></td>
                    <td><?= $value->username ?></td>

                    <td>
                      <a href="<?= base_url('Home/editkurir/'.$value->id_user) ?>
                      " class="btn btn-info">
                      <i class="bi bi-info-lg"></i>
                    </a>



                  </td>

                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->


