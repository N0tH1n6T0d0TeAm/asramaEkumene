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
 
 .konten input{
    width: 100%;
    padding:10px;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: .2s ease;
 }

 .konten input:focus{
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
    <h2>TRANSPORTASI</h2> 
    <form wire:submit="tambah_data_tansportasi">
    <div class="konten">
        
        <input type="text" wire:model="nama" placeholder="Nama">
        <input type="text" wire:model="prodi" placeholder="Prodi">
        <button style="align-self: end; cursor: pointer;" type="submit">Simpan</button>

    </div>
</form>
</center>

<hr>
<h1>Tampilkan data <select class="bulan" id="">
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
            </select></h1>

 
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
        <th>Tanggal</th>
    </tr>
    </thead>

    <tbody>
    @foreach($data as $d)
    <tr class="data" ids="{{$d->id}}" wire:poll.1000ms>
        <td>{{$d->nama}}</td>
        <td>{{$d->prodi}}</td>
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

    
    fetch("/check-password-t", {
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

    document.querySelectorAll('tr.data').forEach(row => {
        let tglText = row.querySelector('.tgl').innerText.toLowerCase();
        
        if (bulan === "") {
            row.style.display = ""; 
        } else if (tglText.includes(bulan)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
    togglePolling(bulan);
}

function togglePolling(bulan) {
    document.querySelectorAll('tr.data').forEach(row => {
        if (bulan === "") {
            row.setAttribute("wire:poll.1000ms", "");
        } else {
            row.removeAttribute("wire:poll.1000ms");
        }
    });

    Livewire.restart();
}

document.querySelector('.bulan').addEventListener('change', filterData);



function aktifkanHapus() {
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
                    fetch('/hapus_data_t/' + ids + '/', {
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
