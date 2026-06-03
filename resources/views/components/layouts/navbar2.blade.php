<div>
  
                                                        <!--

                                                                                                ,   ,
                                                                                                $,  $,     ,
                                                                                                "ss.$ss. .s'
                                                                                        ,     .ss$$$$$$$$$$s,
                                                                                        $. s$$$$$$$$$$$$$$`$$Ss
                                                                                        "$$$$$$$$$$$$$$$$$$o$$$       ,
                                                                                    s$$$$$$$$$$$$$$$$$$$$$$$$s,  ,s
                                                                                    s$$$$$$$$$"$$$$$$""""$$$$$$"$$$$$,
                                                                                    s$$$$$$$$$$s""$$$$ssssss"$$$$$$$$"
                                                                                    s$$$$$$$$$$'         `"""ss"$"$s""
                                                                                    s$$$$$$$$$$,              `"""""$  .s$$s
                                                                                    s$$$$$$$$$$$$s,...               `s$$'  `
                                                                                `ssss$$$$$$$$$$$$$$$$$$$$####s.     .$$"$.   , s-
                                                                                `""""$$$$$$$$$$$$$$$$$$$$#####$$$$$$"     $.$'
                                                        Dibuat Oleh:                 ```"$$$$$$$$$$$$$$$$$$$$$####s""     .$$$|
                                                        - Michael Patrick               "$$$$$$$$$$$$$$$$$$$$$$$$##s    .$$" $
                                                                                        $$""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"   `
                                                                                        $$"  "$"$$$$$$$$$$$$$$$$$$$$S""""'
                                                                                    ,   ,"     '  $$$$$$$$$$$$$$$$####s
                                                                                    $.          .s$$$$$$$$$$$$$$$$$####"
                                                                        ,           "$s.   ..ssS$$$$$$$$$$$$$$$$$$$####"
                                                                        $           .$$$S$$$$$$$$$$$$$$$$$$$$$$$$#####"
                                                                        Ss     ..sS$$$$$$$$$$$$$$$$$$$$$$$$$$$######""
                                                                        "$$sS$$$$$$$$$$$$$$$$$$$$$$$$$$$########"
                                                                ,      s$$$$$$$$$$$$$$$$$$$$$$$$#########""'
                                                                $    s$$$$$$$$$$$$$$$$$$$$$#######""'      s'         ,
                                                                $$..$$$$$$$$$$$$$$$$$$######"'       ....,$$....    ,$
                                                                    "$$$$$$$$$$$$$$$######"' ,     .sS$$$$$$$$$$$$$$$$s$$
                                                                    $$$$$$$$$$$$#####"     $, .s$$$$$$$$$$$$$$$$$$$$$$$$s.
                                                        )          $$$$$$$$$$$#####'      `$$$$$$$$$###########$$$$$$$$$$$.
                                                        ((          $$$$$$$$$$$#####       $$$$$$$$###"       "####$$$$$$$$$$
                                                        ) \         $$$$$$$$$$$$####.     $$$$$$###"             "###$$$$$$$$$   s'
                                                        (   )        $$$$$$$$$$$$$####.   $$$$$###"                ####$$$$$$$$s$$'
                                                        )  ( (       $$"$$$$$$$$$$$#####.$$$$$###'                .###$$$$$$$$$$"
                                                        (  )  )   _,$"   $$$$$$$$$$$$######.$$##'                .###$$$$$$$$$$
                                                        ) (  ( \.         "$$$$$$$$$$$$$#######,,,.          ..####$$$$$$$$$$$"
                                                        (   )$ )  )        ,$$$$$$$$$$$$$$$$$$####################$$$$$$$$$$$"
                                                        (   ($$  ( \     _sS"  `"$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$S$$,
                                                        )  )$$$s ) )  .      .   `$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$"'  `$$
                                                        (   $$$Ss/  .$,    .$,,s$$$$$$##S$$$$$$$$$$$$$$$$$$$$$$$$S""        '
                                                            \)_$$$$$$$$$$$$$$$$$$$$$$$##"  $$        `$$.        `$$.
                                                                `"S$$$$$$$$$$$$$$$$$#"      $          `$          `$
                                                                    `"""""""""""""'         '           '           '


                                                        -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         

        <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'mulish', sans-serif;
        }
        
        a{
            text-decoration: none;
        }
        
        nav{
            position: fixed;
            padding: 10px;
            background:rgb(187, 39, 42);
            width: 17vw;
            height: 100vh;
            transition: .5s;
            left: 0px;
            z-index: 8;
        }
        nav ul{
            margin: 10px;
        }
        nav ul label{
            margin-left: -10px;
        }
        nav ul li{
            font-size: 15px;
            margin: 10px -10px;
            list-style: none;
            padding: 10px;
            border-radius: 3px;
            color: white;
            text-align: justify;
        }

        nav ul li:hover{
            background:rgb(179, 28, 31);
            color: white;
            width: 90%;
        }

        .active{
            background:rgb(179, 28, 31);
            color: white;
            width: 90%;
        }

        nav ul a{
            color: black;
            text-decoration: none;
        }
        .logo{
            display: flex;
            gap: 10px;
            background: #eaeaea;
            align-items: center;
            padding: 10px;
            margin:0;
            width:87%;
        }
        nav label{
            font-size: 15px;
        }
        
        .page{
            background: white;
            margin-left: 20vw;
            padding: 10px;
        }
        .menu{
            font-size: 3em;
            display: none;
            margin: 10px;
        }
        
        .modal-form, .modal{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.27);
            display: none;
            opacity: 0;
            transition: .5s;
            z-index: 2;
        }

        .input-modal, .blank{
            position: fixed;
            background: #fff;
            padding: 10px;
            width: 50%;
            left: 30%;
            overflow-x: auto;
            height: 50%;
             display: none;
            opacity: 0;
            transition: .5s;
            z-index: 777;
        }

        .input-modal #keluar_modal, .blank .keluar_modal2{
            float: right;
            font-size: 20px;
            cursor: pointer;
        }

          form select, form input, textarea{
            width: 100%;
            margin: 2px;
        }

        form input:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 11, 238, 0.6);
        }

        .form-btn button{
            background: none;
            outline: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            margin: 15px;
        }

        select, input, textarea{
             padding: 8px;
            background: #fff;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
            transition: .5s;
            resize: none;
        }

        .form-btn{
            display: flex;
        }

         .form-btn .main-btn{
            border-bottom: 3px solid green;
         }

        .scroll{
            overflow-x: auto; height: 100vh; width: 105%;
        }
        
        table{
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        thead{
            background: #eaeaea;
            height: 10vh;
        }
        tbody tr{
            background: rgb(206, 231, 113);
            height: 10vh;
        }
        
        @media screen and (max-width: 760px){
            table{
                width: 300%;
            }

            nav{
                width: 70vw;
                left: -80em;
                top: 0;
            }

            .logo{
                width:100%;
            }
            .menu{
                z-index: -9999;
                display: block;
            }
            .scroll{
                width: 100%;
            }
            .page{
                margin-left: 4vw;
            }
            .input-modal, .blank{
               position: absolute;
               top: 0;
               left: 0;
               right: 0;
               bottom: 0;
               height: 100%;
               width: 95vw;
            }
        }
    </style>


    </head>
    <body>


<p class="menu">&#8801;</p>
<div class="modal"></div>


    <nav>
        <div class="scroll">

        <div class="logo">
            <img src="{{asset('logo_stte.png')}}" height="30px" alt="">
        </div>
        <ul>
            <a href="/dorm/dashboard"><li class="@if(request()->is('dorm/dashboard')) active @endif"><i class="fa fa-home"></i> Dashboard</li></a>
            <a href="/dorm/polling" wire:navigate> <li class="@if(request()->is('dorm/polling')) active @endif"><i class="fa fa-chart-bar"></i> Polling</li></a>
            <a href="/dorm/jadwal_piket" wire:navigate> <li class="@if(request()->is('dorm/jadwal_piket')) active @endif"><i class="fas fa-broom"></i> Jadwal Piket</li></a>
            <a href="/dorm/izin_keluar" wire:navigate> <li class="@if(request()->is('dorm/izin_keluar')) active @endif"> <i class="fa fa-user"></i> Izin Keluar</li></a>
            <a href="/dorm/publikasi_kegiatan" wire:navigate> <li class="@if(request()->is('dorm/publikasi_kegiatan')) active @endif"> <i class="fa fa-camera-retro"></i> Dormitory Impact</li></a>
            <a href="/dorm/daftar_pengguna" wire:navigate> <li class="@if(request()->is('dorm/daftar_pengguna')) active @endif"> <i class="fa fa-user"></i> Pengguna</li></a>
            <a href="/visitor" wire:navigate> <li> <i class="fa-solid fa-person"></i> Visitor</li></a>
            <a class="logsty" href="/dorm/logout"><li><i class="fas fa-sign-out"></i> Logout</li></a>
        </ul>

        </div>
    </nav>
    
    
    <div class="page" style="overflow-y: hidden">
        {{$main}}
    </div>

    </body>

    
    <script>
       


document.querySelector('.menu').onclick = () => {
    document.querySelector('nav').style.left = '0em';
    document.querySelector('.modal').style.display = 'block';
};

document.querySelector('.modal').onclick = () => {
    document.querySelector('nav').style.left = '-80em';
    document.querySelector('.modal').style.display = 'none';
};

    </script>
    </html>

        
   
</div>