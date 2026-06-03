<div>
  
            
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
            background: #781214;
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
        .modal{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
            display: none;
            opacity: 0;
        }
        
        .scroll{
            overflow-x: auto; height: 100vh; width: 105%;
        }
        
        
        @media screen and (max-width: 800px){
            
           
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
            <a href="/visitor" wire:navigate><li class="@if(request()->is('visitor')) active @endif">All</li></a>
           <a href="/visitor/plumpang" wire:navigate> <li class="@if(request()->is('visitor/plumpang')) active @endif">Plumpang </li></a>
           <a href="/visitor/tipar_cakung" wire:navigate> <li class="@if(request()->is('visitor/tipar_cakung')) active @endif">TC (Timpar Cakung)</li></a>
            <a href="/visitor/kirana" wire:navigate> <li class="@if(request()->is('visitor/kirana')) active @endif"> Kirana</li></a>
             <a href="/dorm/login"> <li class=""> Dorm</li></a>
            <a class="logsty" href="/"><li> < Kembali</li></a>
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