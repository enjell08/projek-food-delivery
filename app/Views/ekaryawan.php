<main id="main" class="main">

  <div class="pagetitle">
    <h1> Form Edit Karyawan</h1>
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
            <h5 class="card-title">Karyawan</h5>
            <form action="<?= base_url ('home/simpan_karyawan') ?>" method="post">   

              <div class="mb-3 mt-3">
                <label for="tgl">Email</label>
                <input type="text" class="form-control" id="eml" placeholder="Enter email" name="username" value="<?= $takdirestui->username?>">
              </div>

              <div class="mb-3">
                <label for="tgl">Level</label>
                <select class="form-select" name="level">
                  <option value="">---Level---</option>
                  <option value="1" <?= ($takdirestui->level == '1') ? 'selected' : '' ?>>Admin</option>
                  <option value="2" <?= ($takdirestui->level == '2') ? 'selected' : '' ?>>Manager</option>
                  <option value="3" <?= ($takdirestui->level == '3') ? 'selected' : '' ?>>Leader Gudang</option>
                  <option value="4" <?= ($takdirestui->level == '4') ? 'selected' : '' ?>>Petugas BM</option>
                  <option value="5" <?= ($takdirestui->level == '5') ? 'selected' : '' ?>>Petugas BK</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="pwd"class="form-label">Nama Karyawan:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Karyawan" name="nama"
                value="<?= $takdirestui->nama ?>">
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

              <div class="mb-3">
               <label for="jabatan"class="form-label">Jabatan:</label>
               <input type="text" class="form-control" id="jabatan" placeholder="Masukkan jabatan" name="jabatan" value="<?= $takdirestui->jabatan ?>">
             </div>

             <input type="hidden" value="<?=$takdirestui->id_user?>" name="idu">
             <input type="hidden" value="<?=$takdirestui->id_karyawan?>" name="idkry">

             <button class="btn btn-dark"><i class="fas fa-save"></i>   Edit</button>
             <a href="<?= base_url('home/hapus_karyawan/'.$takdirestui->id_user) ?>"
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
