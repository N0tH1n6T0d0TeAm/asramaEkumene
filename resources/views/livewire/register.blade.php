<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
        overflow-x: auto;
    }

    .header input{
        padding: 15px;
        outline: none;
        border: none;
        border-radius: 5px;
        width: 30vw;
    }

    .header select{
        padding: 15px;
        outline: none;
        border: none;
        border-radius: 5px;
        width: 32.3vw;
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

.judul_reg_stte{
    margin-top: 15em; text-align: center; background: #efefef; padding: 10px; border-radius: 5px;
}

    @media(max-width: 820px){
        .judul_reg_stte{
            margin-top: 18em;
        }
        .header{
            width: 80vw;
            height: 50vh;
        }

        .header input { 
        width: 70vw;        
    }

    .header select{
        padding: 15px;
        outline: none;
        border: none;
        border-radius: 5px;
        width: 78vw;
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

    <form wire:submit="save">
        <div class="header">

    <h2 class="judul_reg_stte">Silahkan Masukan Data Anda</h2>
        
        <b>Foto Profil</b>
         <label for="foto_profil">
            @if($foto)
            <img src="{{$foto->temporaryUrl()}}" height="120px" width="120px" style=" cursor: pointer; border-radius: 50%; object-fit: cover;"> <br>
            @else
            <img src="https://openclipart.org/image/2000px/247319" height="120px" style=" cursor: pointer;"> <br>
            @endif

            <input type="file" wire:model="foto" id="foto_profil" style="display: none;" accept=".jpg, .jpeg, .png">
         </label>
         
            <input type="text" wire:model="nama_lengkap" placeholder="Nama Lengkap" id="nama_lengkap" required>
           
            <select wire:model="tahun" id="tahun" required>
                <option value="" selected disabled>Angkatan</option>
                @for ($i = 2022; $i <= now()->year; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>

            <select wire:model="prodi_stt" id="prodi" required>
                <option value="" selected disabled>Prodi</option>
                <option value="Teologi">Teologi</option>
                <option value="KonPas (Konseling Pastoral)">KonPas (Konseling Pastoral)</option>
                <option value="PAK (Pendidikan Agama Kristen)">PAK (Pendidikan Agama Kristen)</option>
                <option value="PKAUD (Pendidikan Kristen Anak Usia Dini)">PKAUD (Pendidikan Kristen Anak Usia Dini)</option>
            </select>

            <select wire:model="posisi_asrama" id="asrama" required>
                <option value="" selected disabled>Posisi Asrama</option>
                <option value="Plumpang">Plumpang</option>
                <option value="TC (Tipar Cakung)">TC (Tipar Cakung)</option>
                <option value="Kirana">Kirana</option>
            </select>

            <select wire:model="status_user" id="status" required>
                <option value="" selected disabled>Status</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Gembala Kamar Besar">Gembala Kamar Besar</option>
                <option value="Gembala Kamar Kecil">Gembala Kamar Kecil</option>
                <option value="Anggota Kamar">Anggota Kamar</option>
            </select>
            
            <input type="tel" wire:model="nim_mahasiswa" placeholder="NIM (Nomor Induk Mahasiswa)" id="nim" required>
            <div class="password-container">

        <input type="password" wire:model="password" oninput="show()" placeholder="Password" id="pass" required 
       pattern="^(\S+\s*){1,8}$" 
       title="Password harus 1 sampai 8 kata" >
        <span class="toggle-pass" onclick="togglePassword()">Tampilkan</span>
    </div>
        <button>Register</button>
        <a href="/dorm/login" wire:navigate style="color:rgb(21, 23, 112); text-decoration: none; font-weight: bold;">Login Akun</a>
        <a href="/" style="color:rgb(29, 28, 28); text-decoration: none; font-weight: bold;">Kembali ke Halaman Utama</a>
        </div>
</form>

        
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
