<main id="main" class="main">

  <div class="pagetitle">
    <h1>Table Pengguna</h1>
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
            <h5 class="card-title">Pengguna</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
               <?php
               $ms=1;
               foreach ($takdirestui as $key => $value) {
                ?>
                <tr>
                  <td><?= $ms++ ?></td>
                  <td><?= $value->username ?></td>
                  <td><?= $value->password ?></td>
                  <td><?= $value->level ?></td>
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