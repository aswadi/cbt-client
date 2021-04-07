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
                        <span>SOAL NO.</span> <span class="bg-color no"><?= $question[0]->noUrut;?></span>
                        <input type="hidden" name="no_soal" id="no_soal" value="<?= $question[0]->noUrut;?>">
                    </div>
                    <div class="time"> <span>SISA WAKTU </span><span id="timer" class="bg-color time_on">Check time..</span></div>
                </div>
                
                <div class="clear"></div>
                <hr>
                <div class="question">
                <?php
                // echo '<pre>';
                // print_r($question);
                // echo '<pre>';
                // echo '<pre>';
                // print_r($data_peserta);
                // echo '<pre>';

                ?>
                    <div class="text">
                        <?= $question[0]->teks;?> 
                    </div>
                    <div class="text-added">
                        <?= $question[0]->teksTambahan;?>   
                    </div>        
                </div>
                <hr>
                <div class="answer pb-2"> 
                    <p>Jawaban</p>
                    <input type="radio" id="pilihan1" class="value_answer" name="answer" value="1">
                    <label for="male"><?= $question[0]->pilihan1;?></label><br>
                    <input type="radio" id="pilihan2" class="value_answer" name="answer" value="2">
                    <label for="female"><?= $question[0]->pilihan2;?></label><br>
                    <input type="radio" id="pilihan3" class="value_answer" name="answer" value="3">
                    <label for="other"><?= $question[0]->pilihan3;?></label><br>
                    <input type="radio" id="pilihan4" class="value_answer" name="answer" value="4">
                    <label for="other"><?= $question[0]->pilihan4;?></label>
                </div>
                <div class="prev-next">
                    <div class="prev">
                        <button class="btn btn-sm btn-success" ><i class="fas fa-arrow-circle-left"></i> Sebelumnya</button>
                    </div>
                    <div class="next"> 
                        <button class="btn btn-sm btn-success" id="next"><i class="fas fa-arrow-circle-right"></i> Selanjutnya</button>
                    </div>
                    <div class="clear"></div>
                    
                </div>
            </div>

            <div class="col-md-3" id="wrapothernumber">
                <div class="number_other">
                    <span>DAFTAR SOAL </span>
                    <hr>
                    <div class="question_number">
                    <?php foreach ($question_number as $key => $value) { ?>
                        <div class="number"><?= $value->noUrut; ?></div>     
                    <?php } ?> 
                    </div>
                    <div class="wrap_selesai"> 
                        <button class="btn btn-sm btn-warning" ><i class="fas fa-check-circle"></i> Selesai Ujian</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="/assets/js/sweetalert.js"></script>

    <script>
        $( "#next" ).click(function() {
            var no = parseInt($( "#no_soal" ).val()) + 1; 

            $.ajax({
                url: "<?= site_url('exam/question_load/') ?>" + no,
                type: "POST",
                data: {},
                dataType: "JSON",
                success: function(data) { 
                    console.log(data.question);
                    // location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $.session.set('concheck', 'break');
                    swal({
                        title: "Opps",
                        text: "Opps server tidak terhubung, mencoba menghubungi server..",
                        icon: "warning",
                        buttons: false
                        });
                }
            }); 
        })
         
        var count = <?= $data_peserta[0]->sisaWaktu?>;
        // var count = 500;

        var counter = setInterval(timer, 1000); //10 will  run it every 100th of a second
        $.session.set('concheck', 'up');
        console.log($.session.get('concheck'));

        function timer()
        {
            if (count <= 0)
            {
                clearInterval(counter);
                return;
            }
            count--;
            
            $.ajax({
                url: "<?= site_url('exam/updateTime') ?>",
                type: "POST",
                data: {time : count,
                        },
                dataType: "JSON",
                success: function(data) { 
                    if (data.status == true) { 
                        if ($.session.get('concheck') == 'break') {
                            swal.close();
                        } 
                    }else{
                        // update gagal
                        swal({
                        title: "Opps",
                        text: data.message,
                        icon: "warning",
                        buttons: false
                        });
                    }
                    // location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $.session.set('concheck', 'break');
                    swal({
                        title: "Opps",
                        text: "Opps server tidak terhubung, mencoba menghubungi server..",
                        icon: "warning",
                        buttons: false
                        });
                }
            }); 

            var sec_num = count; 
            var hours   = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours   < 10) {hours   = "0"+hours;}
            if (minutes < 10) {minutes = "0"+minutes;}
            if (seconds < 10) {seconds = "0"+seconds;}
            // document.getElementById("timer").innerHTML=count /100+ " secs"; 
            // document.getElementById("timer").innerHTML=count + " secs"; 
            document.getElementById("timer").innerHTML=hours +":"+ minutes +":"+ seconds; 
        }
    </script>

<?= $this->endSection() ?>