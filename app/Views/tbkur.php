<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Kurir</h1>
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
            <div class="mb-3 mt-3">
              <form action="<?= base_url ('home/aksi_kur') ?>" method="post">               
                <div class="mb-3">
                  <h2>Tambah Kurir </h2>
                  <label for="nama"class="form-label">Nama Kurir:</label>
                  <input type="text" class="form-control" id="kode" placeholder="Masukkan Nama" name="nama" >
                </div>

                <div class="mb-3">
                  <label for="nik"class="form-label">Nik:</label>
                  <input type="text" class="form-control" id="kode" placeholder="Masukkan Nik" name="nik" >
                </div>
                <div class="mb-3">
                  <label for="email"class="form-label">Email:</label>
                  <input type="text" class="form-control" id="tanggal" placeholder="Masukkan Email" name="username" >

                  <div class="mb-3">
                    <label for="pass"class="form-label">Password:</label>
                    <input type="password" class="form-control" id="tanggal" placeholder="Masukkan Password" name="pass" >
                  </div>
                  <div class="mb-3">
                   <label for="level"class="form-label">Level:</label>
                   <input type="text" class="form-control" id="tanggal" placeholder="Masukkan Level" name="level" >
                 </div>

                 <div class="mb-3">
                   <label for="tmp"class="form-label">Tempat Lahir:</label>
                   <input type="text" class="form-control" id="tanggal" placeholder="Masukkan Tempat Lahir" name="tempat">
                 </div>

                 <div class="mb-3">
                  <label for="tgl"class="form-label">Tanggal Lahir:</label>
                  <input type="date" class="form-control" id="tanggal" placeholder="Masukkan Tanggal Lahir" name="tanggal" >
                </div>

                <div class="mb-3">
                  <label for="jk"class="form-label">Jenis Kelamin:</label>
                  <select class="form-control" name="jk">
                    <option>-Pilih Jenis Kelamin </option>
                    <option value="laki_laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                 <label for="almt"class="form-label">Alamat:</label>
                 <input type="text" class="form-control" id="tanggal" placeholder="Masukkan Alamat" name="alamat">
               </div>

               <div class="mb-3">
                 <label for="nohp"class="form-label">No Handphone:</label>
                 <input type="text" class="form-control" id="tanggal" placeholder="Masukkan No Hp" name="nohp">
               </div>

             
               <button type="submit" class="btn btn-primary">Submit</button>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
</section>