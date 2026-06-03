<div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    *{
        font-family: 'mulish', sans-serif;
    }


 .konten{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;  
    background: rgba(107, 88, 88, 0.5);
    padding: 20px;
    width: 50%;
    border-radius: 2px;
 }

 button{
            padding: 10px;
            color: #fff;
            border-radius: 5px;
            outline: none;
            border: none;
            cursor: pointer;
            background: #2467e3;
            transition: .2s ease;
 }

 button:focus{
    box-shadow: 0 0 0 0.25rem rgba(7, 115, 238, 0.6);
 }

 button.hapus{
     background:rgb(227, 36, 36);
 }


 button:focus{
    box-shadow: 0 0 0 0.25rem rgba(185, 31, 20, 0.6);
 }
 
 .konten input, textarea{
    width: 100%;
    padding:10px;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: .2s ease;
    resize: none;
 }

 .cari{
    padding: 10px;
     width: 20%;
    outline: none;
    border: 1px solid black;
    border-radius: 5px;
 }

 .konten input:focus{
    box-shadow: 0 0 0 0.25rem rgba(7, 11, 238, 0.6);
 }

  .konten textarea:focus{
    box-shadow: 0 0 0 0.25rem rgba(7, 11, 238, 0.6);
 }
 

    

    table{
        width: 100%;
        overflow: auto;
    }


    select{
         padding: 8px;
            background: #fff;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
            transition: .5s;
            resize: none;
    }
    @media screen and (max-width: 800px) {
         table{
        width: 100%;
        
    }

    }
</style>


<meta name="csrf-token" content="{{ csrf_token() }}">

<center>
    <h2>KESEHATAN</h2> 
    <form wire:submit="tambah_data_kesehatan">
    <div class="konten">
        
        <input type="text" wire:model="nama" placeholder="Nama">
        <input type="text" wire:model="prodi" placeholder="Prodi/Angkatan">
        <input type="text" wire:model="rumah_sakit" placeholder="Rumah Sakit/Puskesmas">
        <input type="text" wire:model="tb" placeholder="Tb (Trombosit)">
        <input type="text" wire:model="bb" placeholder="BB (Berat Badan)">
        <input type="text" wire:model="tensi" placeholder="tensi">
        <textarea type="text" wire:model="keluhan" placeholder="keluhan"></textarea>
        <textarea wire:model="observasi_dokter" placeholder="Observasi Dokter"></textarea>
        <button style="align-self: end; cursor: pointer;" type="submit">Simpan</button>

    </div>
</form>
</center>

<hr>
<h1>Tampilkan data </h1>
 <select class="bulan" name="" id="">
                <option value="">-- Pilih Bulan -- </option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
    

            <input type="text" class="cari" placeholder="Cari nama...">

          
       

 
@php
function tgl_indo($datetime){
    $bulan = [
        1 => 'Januari','Februari','Maret','April','Mei','Juni',
        'Juli','Agustus','September','Oktober','November','Desember'
    ];

    // Pisahkan tanggal dan waktu
    $parts = explode(' ', $datetime);
    $date = $parts[0]; 
    $time = $parts[1] ?? ''; 

    $tgl = explode('-', $date);
    $formatted = $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];

    if($time){
        $formatted .= ' ' . $time; 
    }

    return $formatted;
}
@endphp

<div style="overflow: auto; width: 100%;">
<table style="text-align: center;">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Rumah Sakit</th>
        <th>Tb (Trombosit)</th>
        <th>Bb (Berat Badan)</th>
        <th>Tensi</th>
        <th>Keluhan</th>
        <th>Observasi Dokter</th>
        <th>Tanggal</th>
    </tr>
    </thead>

    <tbody>
    @foreach($data as $d)
    <tr class="data" ids="{{$d->id}}">
        <td class="nama">{{$d->nama}}</td>
        <td>{{$d->prodi}}</td>
        <td>{{$d->rumah_sakit}}</td>
        <td>{{$d->tb}}</td>
        <td>{{$d->bb}} Kg</td>
        <td>{{$d->tensi}} mmHG</td>
        <td>{!! nl2br($d->keluhan) !!}</td>
        <td>{!! nl2br($d->observasi_dokter) !!}</td>
        <td class="tgl">{{tgl_indo($d->created_at)}}</td>
        <td><button class="hapus" onclick="aktifkanHapus()" id_hapus="{{$d->id}}">Hapus</button></td>
    </tr>
    @endforeach
    </tbody>
    
</table>
</div>

<script>
   document.addEventListener("DOMContentLoaded", () => {
    const pwd = prompt("Masukkan password:");

    if (pwd === null) {
        window.location.reload();
        return; 
    }

    
    fetch("/check-password-k", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ password: pwd })
    })
    .then(res => res.json())
    .then(data => {
        if (data.valid) {
            console.log("Password benar");
        } else {
            alert("Password salah!");
            window.location.reload();
        }
    })
    .catch(err => {
        console.log(err);
        alert("Server error");
    });
});


function filterData() {
    let bulan = document.querySelector('.bulan').value.toLowerCase();
    let nama = document.querySelector('.cari').value.toLowerCase();

    document.querySelectorAll('tr.data').forEach(row => {
        let tglText = row.querySelector('.tgl').innerText.toLowerCase();
        let namaText = row.querySelector('.nama').innerText.toLowerCase();

        let tampil = true;


        if (bulan && !tglText.includes(bulan)) {
            tampil = false;
        }

        
        if (nama && !namaText.includes(nama)) {
            tampil = false;
        }

        row.style.display = tampil ? '' : 'none';
    });
}

document.querySelector('.bulan').addEventListener('change', filterData);
document.querySelector('.cari').addEventListener('input', filterData);



   function aktifkanHapus(){
    document.querySelectorAll('.hapus').forEach(function(el) {
        el.onclick = () => {
            let ids = el.getAttribute('id_hapus');

            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus itu!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/hapus_data_k/' + ids + '/', {
                        method: 'GET',
                    })
                    .then(data => {
                        let tr = document.querySelector('.data[ids="'+ids+'"]');
                        tr.remove(); 

                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data Anda berhasil dihapus!",
                            icon: "success"
                        });
                    })
                    .catch(err => {
                        alert('Koneksi Internet bermasalah!');
                    });
                }
            });
        }
    });
}




</script>

</div>
