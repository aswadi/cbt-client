<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/assets/css/style-own.css"> -->
    <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="/assets/js/jquery.min.js"></script>


    <title>Auth CBT Rafa</title>
    <style>
        html,
        body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #86D380;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }

        .form-signin .checkbox {
        font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }


        #particles {
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;                        
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            z-index: -2;
        }

        .wraplogin{
            margin: auto;
            /* width: 60%; */
            border: 3px solid #73AD21;
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="wraplogin form-signin"  style="text-align:center;">
            <form id="#frm-user" method="post">
                <img class="mb-4" src="assets/img/uin.png" alt="" width="100px" height="100px">
                <!-- <h1 class="h3 mb-3 fw-normal">Silahkan masuk</h1> -->
                <p>Silahkan masuk.</p>

                <div class="form-floating">
                <!-- <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> -->
                <input id="no_tes" type="text" class="form-control" name="no_tes" value="2005060216" placeholder="Nomor tes">                                        
                <label for="floatingInput">Nomor tes</label>
                </div>
                <br>
                <label for="">Tanggal lahir</label>
                <!-- <div class="form-floating"> -->
                    <!-- <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating">

                                <input id="tahun" type="text" class="form-control" name="tahun" value="2002" placeholder="Tahun">                                        
                            <label for="floatingInput">Tahun</label>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <!-- <input id="bulan" type="text" class="form-control" name="bulan" value="07" placeholder="Bulan">                                         -->
                                <select id="bulan" class="form-control" >
                                    <option >Pilih</option>
                                    <option selected value="03">03</option>
                                    <?php 
                                        for ($i=1; $i <= 12; $i++) {  
                                            if (strlen($i) < 2) {
                                                $bulan = '0'.$i;
                                            }else{
                                                $bulan = $i;
                                            }
                                            echo '<option value="'.$bulan.'">'.$bulan.'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <label for="floatingInput">Bulan</label>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <!-- <input id="tanggal" type="text" class="form-control" name="tanggal" value="13" placeholder="Tanggal">                                         -->
                                <select id="tanggal" class="form-control" >
                                    <option >Pilih</option>
                                    <option selected value="20">20</option>

                                    <?php 
                                        for ($i=1; $i <= 31; $i++) {  
                                            if (strlen($i) < 2) {
                                                $tanggal = '0'.$i;
                                            }else{
                                                $tanggal = $i;
                                            }
                                            echo '<option value="'.$tanggal.'">'.$tanggal.'</option>';
                                        }
                                    ?>
                                </select>
                                <label for="floatingInput">Tanggal</label>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <br>
                <button  class="w-100 btn btn-lg btn-success" id="masuk" type="button">Masuk</button>
                <p class="mt-5 mb-3 text-muted">© PUSTIPD Rafa @ 2021</p>
            </form>
        </div>

    </div>
    
    <div id="particles"></div>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="/assets/js/sweetalert.js"></script>

    <script>
        $("#masuk").click(function() { 
                    var no_tes = $('#no_tes').val();
                    var tahun = $('#tahun').val();
                    var bulan = $('#bulan').val();
                    var tanggal = $('#tanggal').val(); 
                    // console.log(no_tes);
                    $('#masuk').prop('disabled', true);

                    $.ajax({
                        url: "<?= site_url('auth/authCheck') ?>",
                        type: "POST",
                        data: {username : no_tes,
                               tahun : tahun,
                               bulan : bulan,
                               tanggal : tanggal},
                        dataType: "JSON",
                        success: function(data) {
                            $('#masuk').prop('disabled', false);
                            // console.log(data.status);
                            
                            if (data.status == true) {
                                // swal("Berhasil", "Anda akan di arahkan dalam..", "success");
                                swal({
                                title: "Berhasil",
                                text: data.message,
                                icon: "success",
                                buttons: false
                                });
                                setTimeout(function(){ 
                                    window.location.href = "/exam";
                                }, 2000); //2000 miliseconds alias 2 detik

                            }else{
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
                            alert('Error select data');
                        }
                    }); 
        });
    </script>


    <script>
                /**
         * Particleground
         *
         * @author Jonathan Nicol - @mrjnicol
         * @version 1.0.1
         * @description Creates a canvas based particle system background
         *
         * Inspired by:
         * http://requestlab.fr/
         * http://disruptivebydesign.com/
         * 
         * @license The MIT License (MIT)
         * 
         * Copyright (c) 2014 Jonathan Nicol - @mrjnicol
         * 
         * Permission is hereby granted, free of charge, to any person obtaining a copy
         * of this software and associated documentation files (the "Software"), to deal
         * in the Software without restriction, including without limitation the rights
         * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
         * copies of the Software, and to permit persons to whom the Software is
         * furnished to do so, subject to the following conditions:
         * 
         * The above copyright notice and this permission notice shall be included in
         * all copies or substantial portions of the Software.
         * 
         * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
         * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
         * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
         * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
         * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
         * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
         * THE SOFTWARE.
         */
        !function(a){function b(b,d){function e(){if(w){$canvas=a('<canvas class="pg-canvas"></canvas>'),v.prepend($canvas),p=$canvas[0],q=p.getContext("2d"),f();for(var b=Math.round(p.width*p.height/d.density),c=0;b>c;c++){var e=new l;e.setStackPos(c),x.push(e)}a(window).on("resize",function(){h()}),a(document).on("mousemove",function(a){y=a.pageX,z=a.pageY}),B&&!A&&window.addEventListener("deviceorientation",function(){D=Math.min(Math.max(-event.beta,-30),30),C=Math.min(Math.max(-event.gamma,-30),30)},!0),g(),o("onInit")}}function f(){p.width=v.width(),p.height=v.height(),q.fillStyle=d.dotColor,q.strokeStyle=d.lineColor,q.lineWidth=d.lineWidth}function g(){if(w){s=a(window).width(),t=a(window).height(),q.clearRect(0,0,p.width,p.height);for(var b=0;b<x.length;b++)x[b].updatePosition();for(var b=0;b<x.length;b++)x[b].draw();E||(r=requestAnimationFrame(g))}}function h(){for(f(),i=x.length-1;i>=0;i--)(x[i].position.x>v.width()||x[i].position.y>v.height())&&x.splice(i,1);var a=Math.round(p.width*p.height/d.density);if(a>x.length)for(;a>x.length;){var b=new l;x.push(b)}else a<x.length&&x.splice(a);for(i=x.length-1;i>=0;i--)x[i].setStackPos(i)}function j(){E=!0}function k(){E=!1,g()}function l(){switch(this.stackPos,this.active=!0,this.layer=Math.ceil(3*Math.random()),this.parallaxOffsetX=0,this.parallaxOffsetY=0,this.position={x:Math.ceil(Math.random()*p.width),y:Math.ceil(Math.random()*p.height)},this.speed={},d.directionX){case"left":this.speed.x=+(-d.maxSpeedX+Math.random()*d.maxSpeedX-d.minSpeedX).toFixed(2);break;case"right":this.speed.x=+(Math.random()*d.maxSpeedX+d.minSpeedX).toFixed(2);break;default:this.speed.x=+(-d.maxSpeedX/2+Math.random()*d.maxSpeedX).toFixed(2),this.speed.x+=this.speed.x>0?d.minSpeedX:-d.minSpeedX}switch(d.directionY){case"up":this.speed.y=+(-d.maxSpeedY+Math.random()*d.maxSpeedY-d.minSpeedY).toFixed(2);break;case"down":this.speed.y=+(Math.random()*d.maxSpeedY+d.minSpeedY).toFixed(2);break;default:this.speed.y=+(-d.maxSpeedY/2+Math.random()*d.maxSpeedY).toFixed(2),this.speed.x+=this.speed.y>0?d.minSpeedY:-d.minSpeedY}}function m(a,b){return b?void(d[a]=b):d[a]}function n(){v.find(".pg-canvas").remove(),o("onDestroy"),v.removeData("plugin_"+c)}function o(a){void 0!==d[a]&&d[a].call(u)}var p,q,r,s,t,u=b,v=a(b),w=!!document.createElement("canvas").getContext,x=[],y=0,z=0,A=!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i),B=!!window.DeviceOrientationEvent,C=0,D=0,E=!1;return d=a.extend({},a.fn[c].defaults,d),l.prototype.draw=function(){q.beginPath(),q.arc(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY,d.particleRadius/2,0,2*Math.PI,!0),q.closePath(),q.fill(),q.beginPath();for(var a=x.length-1;a>this.stackPos;a--){var b=x[a],c=this.position.x-b.position.x,e=this.position.y-b.position.y,f=Math.sqrt(c*c+e*e).toFixed(2);f<d.proximity&&(q.moveTo(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY),d.curvedLines?q.quadraticCurveTo(Math.max(b.position.x,b.position.x),Math.min(b.position.y,b.position.y),b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY):q.lineTo(b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY))}q.stroke(),q.closePath()},l.prototype.updatePosition=function(){if(d.parallax){if(B&&!A){var a=(s-0)/60;pointerX=(C- -30)*a+0;var b=(t-0)/60;pointerY=(D- -30)*b+0}else pointerX=y,pointerY=z;this.parallaxTargX=(pointerX-s/2)/(d.parallaxMultiplier*this.layer),this.parallaxOffsetX+=(this.parallaxTargX-this.parallaxOffsetX)/10,this.parallaxTargY=(pointerY-t/2)/(d.parallaxMultiplier*this.layer),this.parallaxOffsetY+=(this.parallaxTargY-this.parallaxOffsetY)/10}switch(d.directionX){case"left":this.position.x+this.speed.x+this.parallaxOffsetX<0&&(this.position.x=v.width()-this.parallaxOffsetX);break;case"right":this.position.x+this.speed.x+this.parallaxOffsetX>v.width()&&(this.position.x=0-this.parallaxOffsetX);break;default:(this.position.x+this.speed.x+this.parallaxOffsetX>v.width()||this.position.x+this.speed.x+this.parallaxOffsetX<0)&&(this.speed.x=-this.speed.x)}switch(d.directionY){case"up":this.position.y+this.speed.y+this.parallaxOffsetY<0&&(this.position.y=v.height()-this.parallaxOffsetY);break;case"down":this.position.y+this.speed.y+this.parallaxOffsetY>v.height()&&(this.position.y=0-this.parallaxOffsetY);break;default:(this.position.y+this.speed.y+this.parallaxOffsetY>v.height()||this.position.y+this.speed.y+this.parallaxOffsetY<0)&&(this.speed.y=-this.speed.y)}this.position.x+=this.speed.x,this.position.y+=this.speed.y},l.prototype.setStackPos=function(a){this.stackPos=a},e(),{option:m,destroy:n,start:k,pause:j}}var c="particleground";a.fn[c]=function(d){if("string"==typeof arguments[0]){var e,f=arguments[0],g=Array.prototype.slice.call(arguments,1);return this.each(function(){a.data(this,"plugin_"+c)&&"function"==typeof a.data(this,"plugin_"+c)[f]&&(e=a.data(this,"plugin_"+c)[f].apply(this,g))}),void 0!==e?e:this}return"object"!=typeof d&&d?void 0:this.each(function(){a.data(this,"plugin_"+c)||a.data(this,"plugin_"+c,new b(this,d))})},a.fn[c].defaults={minSpeedX:.1,maxSpeedX:.7,minSpeedY:.1,maxSpeedY:.7,directionX:"center",directionY:"center",density:1e4,dotColor:"#666666",lineColor:"#666666",particleRadius:7,lineWidth:1,curvedLines:!1,proximity:100,parallax:!0,parallaxMultiplier:5,onInit:function(){},onDestroy:function(){}}}(jQuery),/**
        * requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel
        * @see: http://paulirish.com/2011/requestanimationframe-for-smart-animating/
        * @see: http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
        * @license: MIT license
        */
        function(){for(var a=0,b=["ms","moz","webkit","o"],c=0;c<b.length&&!window.requestAnimationFrame;++c)window.requestAnimationFrame=window[b[c]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[b[c]+"CancelAnimationFrame"]||window[b[c]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(b){var c=(new Date).getTime(),d=Math.max(0,16-(c-a)),e=window.setTimeout(function(){b(c+d)},d);return a=c+d,e}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)})}();

        $(function(){
                    
            $('#particles').particleground({
                minSpeedX: 0.1,
                maxSpeedX: 0.7,
                minSpeedY: 0.1,
                maxSpeedY: 0.7,
                directionX: 'center', // 'center', 'left' or 'right'. 'center' = dots bounce off edges
                directionY: 'center', // 'center', 'up' or 'down'. 'center' = dots bounce off edges
                density: 10000, // How many particles will be generated: one particle every n pixels
                dotColor: '#eee',
                lineColor: '#eee',
                particleRadius: 7, // Dot size
                lineWidth: 1,
                curvedLines: true,
                proximity: 100, // How close two dots need to be before they join
                parallax: false
            });

        });
    </script>
    
</body>
</html>