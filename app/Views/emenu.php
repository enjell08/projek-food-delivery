<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Menu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
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
            <form action="<?= base_url('home/simpan_edit_menu') ?>" method="post" enctype="multipart/form-data">

    <!-- Nama Menu -->
    <div class="mb-3 mt-3">
        <label for="nama" class="form-label">Nama Menu:</label>
        <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama" 
        value="<?= $takdirestui->nama_menu ?>">
    </div>

    <!-- Kode Menu -->
    <div class="mb-3 mt-3">
        <label for="kode" class="form-label">Kode Menu:</label>
        <input type="text" class="form-control" id="kode" placeholder="Enter kode" name="kode" 
        value="<?= $takdirestui->kode_menu ?>">
    </div>

    <!-- Jenis Menu -->
    <div class="mb-3">
        <label for="jenis_makanan" class="form-label">Jenis Menu:</label>
        <select class="form-control" name="jenis">
            <option>-Pilih Jenis Menu-</option>
            <option value="Minuman" <?= ($takdirestui->jenis_makanan == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
            <option value="Makanan" <?= ($takdirestui->jenis_makanan == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
        </select>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select class="form-control" name="status">
            <option>-Pilih Status-</option>
            <option value="Tersedia" <?= ($takdirestui->status == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
            <option value="Tidak Tersedia" <?= ($takdirestui->status == 'Tidak Tersedia') ? 'selected' : '' ?>>Tidak Tersedia</option>
        </select>
    </div>

    <!-- Harga -->
    <div class="mb-3">
        <label for="harga">Harga</label>
        <input type="text" class="form-control" id="harga" placeholder="Enter harga" name="harga" value="<?= $takdirestui->harga ?>">
    </div>

    <!-- Foto (optional) -->
    <div class="mb-3">
        <label for="foto">Ganti Foto (opsional):</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
    </div>

    <!-- Hidden input for existing photo if no new file is uploaded -->
    <input type="hidden" name="existing_foto" value="<?= $takdirestui->foto ?>">

    <!-- Hidden input for the food ID -->
    <input type="hidden" value="<?= $takdirestui->id_makanan ?>" name="idmkn">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
