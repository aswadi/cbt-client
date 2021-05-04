<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    
    <div class="header">
        <h3><?= $data_ujian[0]->judul;?></h3>
    </div>


    <div class="wrapper">
        <div class="row">
            <div class="col-md-9 pb-2" id="wrapquestion" style="position: relative;">
                <div class="head-question pt-1 pb-1">
                    <div class="number_question">
                        <span>SOAL NO.</span> <span class="bg-color no"><span id="num_change"><?= $question[0]->noUrut;?></span></span>
                        <input type="hidden" name="no_soal" id="no_soal" value="<?= $question[0]->noUrut;?>">
                    </div>
                    <div class="time"> <span>SISA WAKTU </span><span id="timer" class="bg-color time_on">Check time..</span></div>
                </div>
                
                <div class="clear"></div>
                <hr>
                <div class="wrap_question_answer">
                    <div class="question_answer "  style="margin-bottom: 25px;">
                        <div class="wrap_question">
                            <div class="question">
                            <?php
                            // echo '<pre>';
                            // print_r($question);
                            // echo '</pre>';
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
                                <hr>      
                            </div>
                            
                        </div>
                        <div class="xwa"> 
                            <!-- <div class="answer pb-2"> 
                                <p>Jawaban</p>
                                <input type="radio" data-answer="1" id="pilihan1" class="value_answer" name="answer" value="1">
                                <label for="male"> <?= $question[0]->pilihan1;?></label><br>
                                <input type="radio" data-answer="2" id="pilihan2" class="value_answer" name="answer" value="2">
                                <label for="female"> <?= $question[0]->pilihan2;?></label><br>
                                <input type="radio" data-answer="3" id="pilihan3" class="value_answer" name="answer" value="3">
                                <label for="other"> <?= $question[0]->pilihan3;?></label><br>
                                <input type="radio" data-answer="4" id="pilihan4" class="value_answer" name="answer" value="4">
                                <label for="other"> <?= $question[0]->pilihan4;?></label>
                            </div> -->
                        
                            <div class="answer pb-2"> 
                            <?php 
                                if ($question[0]->jawaban == 1) {
                                    $checked1 = 'checked';
                                }else{
                                    $checked1 = '';
                                }
                                if ($question[0]->jawaban == 2) {
                                    $checked2 = 'checked';
                                }else{
                                    $checked2 = '';
                                } 
                                if ($question[0]->jawaban == 3) {
                                    $checked3 = 'checked';
                                }else{
                                    $checked3 = '';
                                } 
                                if ($question[0]->jawaban == 4) {
                                    $checked4 = 'checked';
                                }else{
                                    $checked4 = '';
                                }
                                $kuncisent = md5($question[0]->kunci);
                            ?>
                                <p>Jawaban</p>
                                <input  type="radio" <?= $checked1; ?> data-answer="1" id="pilihan1" class="value_answer" name="answer" value="1">
                                <label for=""><span class="a_1"> <span class="a_1_in"> <?= $question[0]->pilihan1;?> </span></span></label><br>
                                <input type="radio" <?= $checked2; ?> data-answer="2" id="pilihan2" class="value_answer" name="answer" value="2">
                                <label for=""><span class="a_2"> <span class="a_2_in"> <?= $question[0]->pilihan2;?></span></span></label><br>
                                <input type="radio"  <?= $checked3; ?> data-answer="3" id="pilihan3" class="value_answer" name="answer" value="3">
                                <label for=""><span class="a_3"> <span class="a_3_in"><?= $question[0]->pilihan3;?></span></span></label><br>
                                <input type="radio"  <?= $checked4; ?> data-answer="4" id="pilihan4" class="value_answer" name="answer" value="4">
                                <label for=""><span class="a_4"> <span class="a_4_in"><?= $question[0]->pilihan4;?></span></span></label>
                                <div id="xkey" ><input type="hidden" id="xkeyv" name="xkeyv" value="<?= md5($question[0]->kunci)?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="warp-prev-next" style="position: absolute;bottom: 0;">
                    <div class="prev-next">
                        <div class="prev">
                            <button class="btn btn-sm btn-success" id="prev" ><i class="fas fa-arrow-circle-left"></i> Sebelumnya</button>
                        </div>
                        <div class="next"> 
                            <button class="btn btn-sm btn-success" id="next"><i class="fas fa-arrow-circle-right"></i> Selanjutnya</button>
                        </div>
                        <div class="clear"></div>
                        
                    </div>
                </div> -->
                <div class="warp-prev-next" style="position: absolute;bottom: 0; width: 98%; margin-bottom: 8px;">
                    <div class="prev-next" >
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="prev">
                                        <button class="btn btn-sm btn-success" id="prev" ><i class="fas fa-arrow-circle-left"></i> Sebelumnya</button>
                                    </div>
                                </td>
                                <td>
                                <div class="next"> 
                                    <button class="btn btn-sm btn-success" id="next" style="margin-right: 20px;"><i class="fas fa-arrow-circle-right"></i> Selanjutnya</button>
                                </div>
                                </td>
                            </tr>
                        </table>     
                    </div>
                </div>
                
                
            </div>

            <div class="col-md-3" id="wrapothernumber">
                <div class="number_other">
                    <span>DAFTAR SOAL </span>
                    <hr>
                    <div class="question_number">
                    <?php
                    foreach ($question_number as $key => $value) {
                        if ($value->jawaban != 0) {
                            $green = 'style="background-color : green"';
                        }else{
                            $green = '';
                        }

                        if ($value->noUrut == $no_aktif) { ?>
                            <div <?= $green; ?> class=" gray number <?= $value->noUrut; ?> no_aktif " data-no="<?= $value->noUrut; ?>"><?= $value->noUrut; ?></div>   
                        <?php }else {?>
                        <div <?= $green; ?> class="gray number <?= $value->noUrut; ?>" data-no="<?= $value->noUrut; ?>"><?= $value->noUrut; ?></div>     
                    <?php } 
                    } ?> 
                    </div>
                    <div class="wrap_selesai"> 
                        <button class="btn btn-sm btn-warning" id="selesai"><i class="fas fa-check-circle"></i> Selesai Ujian</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="/assets/js/sweetalert.js"></script>

    <script>

        var selesai = <?= $data_peserta[0]->selesai;?>;
        $(document).ready(function() {
            if (selesai == 1) {
                swal({
                        title: "Opps",
                        text: "Opps ujian Anda telah selesai..",
                        icon: "warning",
                        buttons: false
                        });
                setTimeout(function(){ 
                            window.location.href = "/exam";
                        }, 1000);
            }
        });
        function loadquestion(no_load){
            $( ".question").remove();
            $( ".a_1_in").remove();
            $( ".a_2_in").remove();
            $( ".a_3_in").remove();
            $( ".a_4_in").remove();
            $( "#xkeyv").remove();
            var no_on = $( "#no_soal" ).val();
            // $( ".question_answer").remove();
            $( "#num_change").remove();
            // $('input[name=answer]').attr('checked',false);
            // $('#input[type="radio":checked]').checked = false;  
            var ele = document.getElementsByName("answer");
            for(var i=0;i<ele.length;i++)
                ele[i].checked = false;
            
            if (no_load == 'next') {
                if (parseInt($( "#no_soal" ).val()) == <?= $number_last[0]->noUrut; ?>) {
                    var no = 1;
                    $( ".no_aktif" ).removeClass( "no_aktif");
                    $( "."+no+"" ).addClass( "no_aktif" );
                }else{
                    var no = parseInt($( "#no_soal" ).val()) + 1; 
                    $( ".no_aktif" ).removeClass( "no_aktif");
                    $( "."+no+"" ).addClass( "no_aktif" );
                }
            }else if (no_load == 'prev'){
                if (parseInt($( "#no_soal" ).val()) == 1) {
                    var no = <?= $number_last[0]->noUrut; ?>;
                    $( ".no_aktif" ).removeClass( "no_aktif");
                    $( "."+no+"" ).addClass( "no_aktif" );
                }else{
                    var no = parseInt($( "#no_soal" ).val()) - 1; 
                    $( ".no_aktif" ).removeClass( "no_aktif");
                    $( "."+no+"" ).addClass( "no_aktif" );
                }
            }else{
                var no = no_load; 
                
            }
            
            $.ajax({
                url: "<?= site_url('exam/question_load/') ?>" + no,
                type: "POST",
                data: {},
                dataType: "JSON",
                success: function(data) { 
                    // console.log(data);
                    $('#no_soal').val(no)
                    // console.log(data.question[0].teks);
                    if (data.question[0].teksTambahan != null) {
                        var tambahan = data.question[0].teksTambahan;
                    }else{
                        var tambahan = '';
                    }
                    $(".no").append('<span id="num_change">'+no+'</span>');
                    $(".wrap_question").append('<div class="question"> <div class="text">'+data.question[0].teks+'</div>'+
                            '<div class="text-added">'+tambahan+'</div>'+       
                        '<hr></div>');
                    // console.log(data.question[0].jawaban);
                    if (data.question[0].jawaban == 1) {
                        document.getElementById("pilihan1").checked = true;
                    }
                    if (data.question[0].jawaban == 2) {
                        document.getElementById("pilihan2").checked = true;
                    }
                    if (data.question[0].jawaban == 3) {
                        document.getElementById("pilihan3").checked = true;
                    }
                    if (data.question[0].jawaban == 4) {
                        document.getElementById("pilihan4").checked = true;
                    }
                    var kunci = data.question[0].kunci;
                    var valKunci = 'cfcd208495d565ef66e7dff9f98764da';
                    if (kunci == 1) {
                        valKunci = 'c4ca4238a0b923820dcc509a6f75849b';
                    }else if(kunci == 2){
                        valKunci = 'c81e728d9d4c2f636f067f89cc14862c';
                    }else if(kunci == 3){
                        valKunci == 'eccbc87e4b5ce2fe28308fd9f2a7baf3';
                    }else if(kunci == 4){
                        valKunci = 'a87ff679a2f3e71d9181a67b7542122c';
                    }else{
                        valKunci = 'cfcd208495d565ef66e7dff9f98764da';
                    }
                    console.log(valKunci);
                    console.log(kunci);

                    $(".a_1").append('<span class="a_1_in">'+data.question[0].pilihan1+'</span>');
                    $(".a_2").append('<span class="a_2_in">'+data.question[0].pilihan2+'</span>');
                    $(".a_3").append('<span class="a_3_in">'+data.question[0].pilihan3+'</span>');
                    $(".a_4").append('<span class="a_4_in">'+data.question[0].pilihan4+'</span>');
                    $("#xkey").append('<input type="hidden" id="xkeyv" name="xkeyv" value="'+valKunci+'">');
                    // $(".xwa").append('<div class="answer pb-2">'+ 
                    //             '<p>Jawaban</p>'+
                    //             '<input type="radio" data-answer="1" id="pilihan1" class="value_answer" name="answer" value="1">'+
                    //             '<label for="male"> '+data.question[0].pilihan1+'</label><br>'+
                    //             '<input type="radio" data-answer="2" id="pilihan2" class="value_answer" name="answer" value="2">'+
                    //             '<label for="female"> '+data.question[0].pilihan2+'</label><br>'+
                    //             '<input type="radio" data-answer="3" id="pilihan3" class="value_answer" name="answer" value="3">'+
                    //             '<label for="other"> '+data.question[0].pilihan3+'</label><br>'+
                    //             '<input type="radio" data-answer="4" id="pilihan4" class="value_answer" name="answer" value="4">'+
                    //             '<label for="other"> '+data.question[0].pilihan4+'</label>'+
                    //         '</div>');
                    // console.log(data.question);
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

        }

        $( "#next" ).click(function(){
            loadquestion('next');
        });

        $("#prev").click(function() {
            loadquestion('prev');
        });

        $("#selesai").click(function() { 
            swal({
            title: "Anda yakin ingin selesai?",
            text: 'Anda tidak bisa mengulangi ujian kembali!', 
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    update_finish();
                }  
            });
        });

        $(".number").click(function() { 
            var no_change = $(this).attr("data-no");
            $( ".no_aktif" ).removeClass( "no_aktif");

            $( "."+no_change+"" ).addClass( "no_aktif" );
            // $( "."+no_change+"" ).addClass("answered");

            loadquestion(no_change);
        });
        $(".value_answer").click(function() { 
            var answer = $(this).attr("data-answer");
            var no  = parseInt($( "#no_soal" ).val());
            var xkey  = $( "#xkeyv" ).val();
            $( "."+no+"" ).removeClass( "gray");
            

            update_answer(answer, no, xkey);
            // console.log(answer); 
            // console.log(no); 
        });
        

        // $('#pilihan1').click(function(){
        //     var answer = $("#pilihan1").val();
        //     console.log(answer);
        // });
        // $('#pilihan2').click(function(){
        //     var answer = $("#pilihan2").val();
        //     console.log(answer);
        // });
        // $('#pilihan3').click(function(){
        //     var answer = $("#pilihan3").val();
        //     console.log(answer);
        // });
        // $('#pilihan4').click(function(){
        //     var answer = $("#pilihan4").val();
        //     console.log(answer);
        // });
         
        var count = <?= $data_peserta[0]->sisaWaktu?>;
        // var count = 60;

        var counter = setInterval(timer, 1000); //10 will  run it every 100th of a second
        $.session.set('concheck', 'up'); 

        function update_answer(answer,no,xkey)
        { 
            $( "."+no+"" ).addClass("answered");
            var keysent = String(xkey);
            console.log(xkey);

            $.ajax({
                url: "<?= site_url('exam/updateAnswer') ?>",
                type: "POST",
                data: {answer : answer,
                       Urut : no, 
                       Xkey : keysent, 
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
        }

        function update_finish()
        { 
            $.ajax({
                url: "<?= site_url('exam/updateFinish') ?>",
                type: "POST",
                data: {time : count,
                        },
                dataType: "JSON",
                success: function(data) { 
                    if (data.status == true) { 
                        swal({
                        title: "Berhasil",
                        text: data.message,
                        icon: "success",
                        buttons: false
                        });
                        setTimeout(function(){ 
                            window.location.href = "/exam";
                        }, 1000);
                    }else{
                        // update gagal
                        swal({
                        title: "Berhasil",
                        text: data.message,
                        icon: "success",
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
        }

        function timer()
        {
            
            if (count <= 0)
            {
                clearInterval(counter);
                update_finish();  
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
            // $("#timer").innerHTML=hours +":"+ minutes +":"+ seconds; 
        }
    </script>

<?= $this->endSection() ?>