<main id="main" class="main">

  <div class="pagetitle">
    <h1>Menu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Menu</h5>

            <!-- Form Tambah Menu -->
            <form action="<?= base_url('home/simpan_menu') ?>" method="post" enctype="multipart/form-data">

              <!-- Nama Menu -->
              <div class="mb-3">
                <label for="makanan" class="form-label">Nama Menu:</label>
                <input type="text" class="form-control" id="makanan" name="makanan" 
                  placeholder="Masukkan Nama Menu" 
                  value="<?= isset($takdirestui->nama_menu) ? $takdirestui->nama_menu : '' ?>" 
                  required>
              </div>
              <div class="mb-3">
                <label for="makanan" class="form-label">Kode Menu:</label>
                <input type="text" class="form-control" id="makanan" name="kode" 
                  placeholder="Masukkan Kode Menu" 
                  value="<?= isset($takdirestui->kode_menu) ? $takdirestui->kode_menu : '' ?>" 
                  required>
              </div>

              <!-- Jenis Menu -->
              <div class="mb-3">
                <label for="jenis_makanan" class="form-label">Jenis Menu:</label>
                <select class="form-control" name="jenis" required>
                  <option value="">- Pilih Jenis Menu -</option>
                  <option value="minuman">Minuman</option>
                  <option value="makanan">Makanan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="status" class="form-label">Status Menu:</label>
                <select class="form-control" name="status" required>
                  <option value="">- Pilih Status -</option>
                  <option value="tersedia">Tersedia</option>
                  <option value="tidak tersedia">Tidak Tersedia</option>
                  </select>
              </div>

              <!-- Harga -->
              <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" 
                  placeholder="Masukkan Harga" 
                  value="<?= isset($takdirestui->harga) ? $takdirestui->harga : '' ?>" 
                  required>
              </div>

              <!-- Upload Foto -->
              <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Simpan Menu</button>

            </form>
            <!-- End Form -->
          </div>
        </div>

      </div>
    </div>
  </section>
</main>
