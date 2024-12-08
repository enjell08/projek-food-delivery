<main id="main" class="main">

  <div class="pagetitle">
    <h1>Kurir</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
            <h5 class="card-title">Kurir</h5>

            <h2>Kurir </h2>
            <form action="<?= base_url ('home/simpan_kurir') ?>" method="post" enctype="multipart/form-data">

              <div class="mb-3 mt-3">
                <label for="makanan"class="form-label">Nama Kurir :</label>
                <input type="text" class="form-control" id="makanan" placeholder="Enter Nama" name="nama">
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
             <label for="almt"class="form-label">No Handphone:</label>
             <input type="text" class="form-control" id="nohp" placeholder="Masukkan nohp" name="nohp">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>

         </form>
       </div>
     </div>

   </div>
 </div>
</section>