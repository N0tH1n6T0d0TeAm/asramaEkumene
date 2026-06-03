<div>

<style>
    .upload_konten{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 3em;
    }
    .upload_konten2{
        width: 80%;
    }
    .plus{
        border: 1px solid black;
        text-align: center;
        padding: 40px;
        cursor: pointer;
        border-radius: 8px;
    }
    textarea{
        height: 80px;    
    }
    .deskripsi_konten .tombol{
        position: relative;
        left: -4px;
        margin-top: -30px;
        float: right;
        padding: 4px;
        background: none;
        cursor: pointer;
        border: none;
    }

 .stt_ekumene_post {
    display: flex;
    flex-direction: column; 
    align-items: center;    
    justify-content: center; 
}

.card {
  display: flex;
  flex-direction: column;
  text-align: center;
}

.kontainer{
    position: relative; 
    width: 100%;
}

.kiri, .kanan{
    position: absolute;
    top: 30vh;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30px;
    width: 2vw;
    font-size: 20px;
    z-index: 2;
    cursor: pointer;
    background: rgb(196, 29, 32);
    border: none;
    box-shadow: 2px 3px 8px rgba(0,0,0,0.5);
    color:white;
    height: 50px;
    width: 3vw;
    border-radius: 3px;
}


.kiri,.kiri2{
    left: 0;
}

 .kanan,.kanan2{
    right: 0;
}

::-webkit-scrollbar{
display: none;
}

.asrama_virtual_tour{
    display: flex;
    flex-direction: row;
    
}

.card_virtual{
    display: flex;
    flex-direction: column;

}



.kartu{
   margin-top: 5em;
   display: flex;
   flex-direction: column;
   gap: 5px;
   width: 50vw;
}

.kartu .kanan3{
    align-self: end;
}

.kiri3, .kanan3{
    position: absolute;
    margin-top: 25em;
    cursor: pointer;
    padding: 10px;
}




.kartu .gambar_konten_asrama_stt_ekumene{
    display: flex;
    flex-direction: row;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    max-width: 700px; 
    align-self: center;
    height: 500px;
}

.gambar_konten_asrama_stt_ekumene img{
    flex: 1 0 100%;
    scroll-snap-align: start;
    border-radius: 8px; 
    object-fit: cover;
}


        .btn{
            padding: 10px;
            background: #2467e3;
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        .btn:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 115, 238, 0.6);
        }

        .publik_setting{
            position: absolute;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-self: end;
            background: rgb(43, 28, 28);
            width:10%;
            padding: 10px;
           opacity: 0;
           display: none;
        }

        .publik_setting a{
            color: white;
        }

        .publik_setting a:hover{
            background: rgba(110, 93, 93, 0.5);
        }

        .modalz{
            position: fixed; top: 0; left: 0; right: 0; bottom: 0; display: none;
        }

@media screen and (max-width: 1027px){
   

    .kiri3, .kanan3{
    position: absolute;
    margin-top: 10em;
    cursor: pointer;
    padding: 10px;
}


    .kartu .gambar_konten_asrama_stt_ekumene{
    display: flex;
    flex-direction: row;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    max-width: 300px; 
    align-self: center;
    height: 200px;
}



    .stt_ekumene_post img{
    height: 200px;
    width: 20em;
}


.kartu{
    width: 100%;
}
}
</style>

<a href="/visitor" wire:navigate><button class="btn">Pergi Ke Visitor</button></a>
    <div class="upload_konten">
        <div class="upload_konten2">
        <label for="upload">
            <form wire:submit="tambah_kegiatan">
            <div class="plus">
                <i class="fas fa-plus"></i>
            </div>
            <small style="color: red;">* Maksimal 15 foto!</small>

            <input type="file" style="display: none;" wire:model="foto" id="upload" multiple accept=".jpg, .png, .jpeg">
        </label> <br><br>

        <div class="tampilkan_gambar" id="preview">
            @if($foto)
            @foreach($foto as $f)   
                <img src="{{ $f->temporaryUrl() }}" alt="preview" width="100">
                @endforeach
            @endif
        </div>

        
        <div class="deskripsi_konten">
            <select wire:model="asrama" id="" required>
                <option value="Semua">Semua</option>
                @if(Auth::user()->asrama == "Plumpang")
                <option value="Plumpang">Plumpang</option>

                @elseif(Auth::user()->asrama == "TC (Tipar Cakung)")
                <option value="TC (Tipar Cakung)">TC (Tipar Cakung)</option>

                @elseif(Auth::user()->asrama == "Kirana")
                <option value="Kirana">Kirana</option>
                @endif
            </select>
            <textarea wire:model="deskripsi" placeholder="Ada Kegiatan Apa Sekarang?" id="deskripsi" required></textarea>
            <button class="tombol"><i class="fas fa-paper-plane" style="float: right;"></i></button>
        </div>
        
        </form>
    </div>
    </div>


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

<div class="modalz">

</div>


    <div class="stt_ekumene_post">
      @foreach($data2 as $d)
        <div class="kartu" id="{{$d->id}}">
            <b>{{$d->posisi_asrama}}  <i style="cursor: pointer; float: right" id_setting="{{$d->id}}" class="fa-solid fa-ellipsis-vertical settings"></i></b>
            <div class="publik_setting" id="publik{{$d->id}}">
                <a href="/dorm/edit_kegiatan/{{$d->id}}" wire:navigate>Edit</a>
                <a class="hapus_kegiatan" idz="{{$d->id}}">Hapus</a>
            </div>

            <p>{{tgl_indo($d->created_at)}}</p>

           
            <button class="kiri3">&lt;</button>
            <button class="kanan3">&gt;</button>

            <div class="gambar_konten_asrama_stt_ekumene">
                
            @foreach($data->where('id_kegiatan', $d->id) as $ds)
            <img src="{{asset('storage/' . $ds->foto_kegiatan)}}" alt="">
            @endforeach

            </div>
            <p>{!! nl2br($d->deskripsi) !!}</p>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </div>
       @endforeach

    
</div>

        <script>
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('hapus_kegiatan')) {
        let el = e.target;
        let ids = el.getAttribute('idz');

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
                fetch('/dorm/hapus_kegiatan/' + ids + '/', {
                    method: 'GET',
                })
                .then(data => {
                    Swal.fire({
                        title: "Good job!",
                        text: "Kamu Berhasil Menghapus Data!",
                        icon: "success"
                    });

                    document.querySelector('.kartu[id="'+ids+'"]').remove();
                })
                .catch(err => {
                    Swal.fire({
                        title: "Masalah Internet!",
                        text: "Mohon Periksa Sinyal Internet Anda!",
                        icon: "info"
                    });
                });
            }
        });
    }
});

          
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('settings')) {
        let id_settings = e.target.getAttribute('id_setting');

        document.querySelector('#publik' + id_settings).style.display = 'flex';
        document.querySelector('#publik' + id_settings).style.opacity = '1';
        document.querySelector('.modalz').style.display = 'block';
    }
});


document.querySelector('.modalz').onclick = function(){
  document.querySelector('.modalz').style.display = 'none';
    document.querySelectorAll('.settings').forEach(el => {
        id_settings = el.getAttribute('id_setting');

        document.querySelector('#publik' + id_settings).style.display = 'none';
           document.querySelector('#publik' + id_settings).style.opacity = '0';
    })
      
}

document.getElementById('upload').addEventListener('change', function(e) {
        let files = Array.from(e.target.files);
        if(files.length > 15){
            files = files.slice(0, 15); 
        }

        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        e.target.files = dataTransfer.files;

         e.target.dispatchEvent(new Event('input', { bubbles: true }));
    });
    

   document.querySelectorAll('.kiri3').forEach(button => {
        button.addEventListener('click', () => {
            const container = button.closest('.kartu').querySelector('.gambar_konten_asrama_stt_ekumene');
            const nilaiScroll = window.matchMedia("(min-width: 1024px)").matches ? 800 : 300;

            container.scrollBy({
                left: -nilaiScroll, 
                behavior: 'smooth'
            });
        });
    });

    document.querySelectorAll('.kanan3').forEach(button => {
        button.addEventListener('click', () => {
            const container = button.closest('.kartu').querySelector('.gambar_konten_asrama_stt_ekumene');
           
            const nilaiScroll = window.matchMedia("(min-width: 1024px)").matches ? 500 : 300;

            container.scrollBy({
                left: nilaiScroll, 
                behavior: 'smooth'
            });
        });
    });
        </script>
</div>
