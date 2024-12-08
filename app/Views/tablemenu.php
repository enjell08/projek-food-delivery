<main id="main" class="main">

  <div class="pagetitle">
    <h1>Menu Makanan</h1>
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
            <h5 class="card-title">Table Menu</h5>
            <a href="<?= base_url('home/inputmenu') ?>" class="btn btn-success">+Tambah</a>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Foto</th>
                  <th>Nama Menu</th>
                  <th>Kode Menu</th>
                  <th >Jenis Menu</th>
                  <th >Status</th>
                  <th >Harga</th>
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
                    <td>
                      <img src="<?= base_url('img/' . $value->foto); ?>" width="50">
                    </td>
                    <td><?= $value->nama_menu?></td>
                    <td><?= $value->kode_menu?></td>
                    <td><?= $value->jenis_makanan ?></td>
                    <td><?= $value->status?></td>
                    <td><?= $value->harga ?></td>
                    <td>
                      <a href="<?= base_url('Home/editmenu/'.$value->id_makanan) ?>
                      " class="btn btn-info"><i class="bi bi-info-lg"></i></a>
                      <a href="<?= base_url('Home/hapus_menu/'.$value->id_makanan) ?>
                      "class="btn btn-danger" ><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>