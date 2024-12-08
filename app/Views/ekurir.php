<main id="main" class="main">

  <div class="pagetitle">
    <h1> Form Edit Kurir</h1>
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
            <form action="<?= base_url ('home/simpan_kur') ?>" method="post">   

              <div class="mb-3 mt-3">
                <label for="tgl">Email</label>
                <input type="text" class="form-control" id="eml" placeholder="Enter email" name="username" value="<?= $takdirestui->username?>">
              </div>

              <div class="mb-3">
                <label for="pwd"class="form-label">Nama Customer:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Kurir" name="nama"
                value="<?= $takdirestui->nama_kurir?>">
              </div>

              <div class="mb-3">
                <label for="tgl">NIK</label>
                <input type="text" class="form-control" id="tgl" placeholder="Enter NIK" name="nik" value="<?= $takdirestui->nik ?>">
              </div>

              <div class="mb-3">
                <label for="tmp">Tempat Lahir</label>
                <input type="text" class="form-control" id="tmp" placeholder="Enter Tempat Lahir" name="tempat" value="<?= $takdirestui->tempat_lahir ?>">
              </div>

              <div class="mb-3">
                <label for="tgl">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl" placeholder="Enter Tanggal Lahir" name="tanggal" value="<?= $takdirestui->tanggal_lahir ?>">
              </div>

              <div class="mb-3">
                <label for="jk"class="form-label">Jenis Kelamin:</label>
                <select class="form-control" name="jk"  value="<?= $takdirestui->jenis_kelamin ?>">
                  <option>-Pilih Jenis Kelamin </option>
                  <option value="laki_laki" <?= $takdirestui->jenis_kelamin == 'laki_laki' ? 'selected' : '' ?>>Laki-Laki</option>
                  <option value="perempuan" <?= $takdirestui->jenis_kelamin == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="tgl">Alamat</label>
                <input type="text" class="form-control" id="tgl" placeholder="Enter Alamat" name="alamat" value="<?= $takdirestui->alamat ?>">
              </div>

              <div class="mb-3">
                <label for="tgl">No Handphone</label>
                <input type="text" class="form-control" id="tgl" placeholder="Enter No Handphone" name="hp" value="<?= $takdirestui->no_handphone ?>">
              </div>

             <input type="hidden" value="<?=$takdirestui->id_user?>" name="idu">
             <input type="hidden" value="<?=$takdirestui->id_kurir?>" name="idk">

             <button class="btn btn-dark"><i class="fas fa-save"></i>   Edit</button>
             <a href="<?= base_url('home/hapus_kurir/'.$takdirestui->id_user) ?>"
              class="btn btn-danger" >
              <i class="fas fa-trash-alt"></i>
              Hapus
            </a>

          </form>
        </div>
      </div>

    </div>
  </div>
</section>
