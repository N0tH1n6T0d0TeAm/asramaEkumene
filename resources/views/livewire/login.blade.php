<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        *{
            font-family: 'mulish', sans-serif;
        }

        body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center; 
        align-items: center;   
         background: url('https://maukuliah.ap-south-1.linodeobjects.com/gallery/233119/1701399952-TnI7MA3ep2-thumbnail.jpg');
            background-size: cover;
        }
        
        .header {
        display: flex;  
        flex-direction: column;
        justify-content: center;
        gap: 10px;
        align-items: center;
        height: 70vh;       
        width: 50vw;        
        background-color:rgba(240, 240, 240, 0.45);
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
    }

    .header input{
        padding: 15px;
        outline: none;
        border: none;
        border-radius: 5px;
        width: 30vw;
    }

    .header input:focus{
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.52);
        transition: .5s;
    }

    .header button{
        padding: 10px;
        width: 30vw;
    outline: none;
        border: none;
        background: #4e4ea5;
        cursor: pointer;
        color: white;
        border-radius: 5px;
    }

    .header button:hover{
        background: #1d1da3;
        transition: .5s;
    }

    .password-container {
    position: relative;   
}

.toggle-pass {
    display: none;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #4e4ea5;
    font-weight: bold;
    font-size: 0.9em;
    user-select: none;
}


    @media(max-width: 930px){
        .header{
            width: 80vw;
            height: 50vh;
        }

        .header input { 
        width: 70vw;        
    }

    .header button{
        width: 75vw;
    }
    }

    </style>
    @livewireStyles
</head>


<body>

   
 <center><img src="{{asset('logo_stte.png')}}" alt="" height="50" style="margin-top: 2em; background: #efefef; padding: 10px; border-radius: 10px"></center>

    <form wire:submit.prevent="login">

        <div class="header">
    <h2 style="background: #efefef; padding: 10px; border-radius: 5px;">Login</h2>
    
        
        
         @if(session()->has('error'))
            <b>{{session('error')}}</b>
        @enderror
        <input type="tel" wire:model="nim_mahasiswa" placeholder="NIM" id="nim" required>
        <div class="password-container">
    <input type="password" wire:model="password" oninput="show()" placeholder="Password" id="pass" required>
    <span class="toggle-pass" onclick="togglePassword()">Tampilkan</span>
</div>
        <button>Login</button>
        <a href="/dorm/register" wire:navigate style="color:rgb(214, 17, 17); text-decoration: none; font-weight: bold;">Registrasi Akun</a>
        <a href="/" style="color:rgb(29, 28, 28); text-decoration: none; font-weight: bold;">Kembali</a>
        </div>
</form>
        @livewireScripts
</body>

<script>
    function show(){
        if(document.querySelector('#pass') != null){
            document.querySelector('.toggle-pass').style.display = 'block';
        }
    }

function togglePassword() {
    const pass = document.querySelector('#pass');
    if (pass.type === 'password') {
        pass.type = 'text';
        document.querySelector('.toggle-pass').innerText = 'Sembunyikan';
    } else {
        pass.type = 'password';
        document.querySelector('.toggle-pass').innerText = 'Tampilkan';
    }
}
</script>

</html>
</div>
