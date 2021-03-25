<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="header">
        <h3>Ujian berbasis komputer, UIN Raden Fatah Palembang</h3>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-md-9" id="wrapquestion">
                <div class="number_question">
                    <span>SOAL NO. 13</span>
                    <hr>
                </div>
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, voluptatibus. Placeat consectetur, obcaecati a laudantium voluptatem rem, accusantium, consequatur voluptates quod culpa rerum fugit esse doloribus maxime corrupti dicta enim!
                    <hr>
                </div>
                <div class="answer">
                    <ul>
                        <li>A. dsdw</li>
                        <li>B. dsdw</li>
                        <li>C. dsdw</li>
                    </ul>
                </div>
                <div class="prev-next">
                    <div class="prev">
                        <span class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Sebelumnya</span>
                    </div>
                    <div class="next">
                        <span class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-right"></i> Selanjutnya</span>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3" id="wrapothernumber">
                <div class="number_other">
                    <span>NOMOR SOAL</span>
                    <hr>
                </div>
            </div>

        </div>
    </div>

<?= $this->endSection() ?>