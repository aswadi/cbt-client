<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<h3>Ujian berbasis komputer, UIN Raden Fatah Palembang</h3>
<div  class="alert alert-success info_ujian" role="alert">
    Info ! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque qui voluptatibus velit repellendus eaque! Quam id fuga ut voluptatum pariatur! Veniam maxime eveniet exercitationem iure, a fuga voluptates eligendi nulla!
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card" style="widthx: 18rem;">
        <div class="card-body">
            <img src="assets/img/uin.png" class="" alt="..." style="width:100px; height:100px">
            <!-- <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama : <?= $data_peserta['nama'];?></li>
            <li class="list-group-item">No tes : <?= $data_peserta['kodeRegistrasi'];?></li>
            <li class="list-group-item">Tempat lahir : <?= $data_peserta['tempatLahir'];?></li>
            <li class="list-group-item">Tanggal lahir : <?= $data_peserta['tanggalLahir'];?></li>
        </ul>
        <!-- <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div> -->
    </div>
       
    


    </div>
    <div class="col-md-6">
        <!-- <?php print_r($data_peserta);?> -->
        <div  class="alert alert-success info_ujian" role="alert">
            Info ! Lorem ipsum dolor sit, amet consectetur adipisicing elit. A 
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Sisa waktu : <?= $data_peserta['sisaWaktu'] / 60;?> menit</li>
            <li class="list-group-item">Jam : <?= $data_peserta['sesiJam'];?></li>
            <li class="list-group-item">Tanggal Ujian : <?= $data_peserta['tanggalUjian'];?></li>
            <li class="list-group-item">Ruang Ujian : <?= $data_peserta['ruangan'];?></li>
        </ul>
        <br>

        <a href="<?= base_url('exam/test');?>" class="btn btn-sm btn-success">Mulai Ujian</a>

        <a href="<?= base_url('exam/simulation');?>" class="btn btn-sm btn-secondary">Simulasi Ujian</a>

    </div>
</div>
<?= $this->endSection() ?>