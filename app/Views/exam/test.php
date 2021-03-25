<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="header">
        <h3>Ujian berbasis komputer, UIN Raden Fatah Palembang</h3>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-md-9 pb-2" id="wrapquestion">
                <div class="head-question pt-1 pb-1">
                    <div class="number_question ">
                        <span>SOAL NO.</span> <span class="bg-color no">13</span>
                    </div>
                    <div class="time"> <span>SISA WAKTU </span><span class="bg-color time_on">01:30:29</span></div>
                </div>
                
                <div class="clear"></div>
                <hr>
                <div class="question">
                    <div class="text">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, voluptatibus. Placeat consectetur, obcaecati a laudantium voluptatem rem, accusantium, consequatur voluptates quod culpa rerum fugit esse doloribus maxime corrupti dicta enim!
                        </p>
                        <p>
                        للترويح عن النفس
                        </p>
                        <img src="/assets/img/exam.jpg" alt="" srcset="" width="200px">
                    </div>
                    <div class="text-added">
                        <p>اختر الأجوبة المناسبة للأسئلة التالية</p>   
                    </div>
                   
                    
                </div>
                <hr>
                <div class="answer pb-2">
                    <!-- <ul>
                        <li>A. dsdw</li>
                        <li>B. dsdw</li>
                        <li>C. dsdw</li>
                        <li>D. dsdw</li>
                    </ul> -->
                    <p>Jawaban</p>
                    <input type="radio" id="male" name="answer" value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="answer" value="female">
                    <label for="female">Female</label><br>
                    <input type="radio" id="other" name="answer" value="other">
                    <label for="other">Other</label>
                </div>
                <div class="prev-next">
                    <div class="prev">
                        <button class="btn btn-sm btn-primary" ><i class="fas fa-arrow-circle-left"></i> Sebelumnya</button>
                    </div>
                    <div class="next"> 
                        <button class="btn btn-sm btn-primary" ><i class="fas fa-arrow-circle-right"></i> Selanjutnya</button>
                    </div>
                    <div class="clear"></div>
                    
                </div>
            </div>

            <div class="col-md-3" id="wrapothernumber">
                <div class="number_other">
                    <span>DAFTAR SOAL</span>
                    <hr>
                    <div class="question_number">
                        <div class="number">2</div> <div class="number">1</div>
                        
                        <div class="number">3</div>
                        <div class="number">1</div>
                        <div class="number">2</div>
                        <div class="number">3</div>
                        <div class="number">12</div>
                        <div class="number">332</div>
                        <div class="number">1</div>
                        <div class="number">2</div>
                        <div class="number">3</div>
                        <div class="number">1</div>
                        <div class="number">3</div>
                        <div class="number">1</div> 
                    </div>
                </div>
            </div>

        </div>
    </div>

<?= $this->endSection() ?>