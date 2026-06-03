<div>


<title>Kegiatan Bersama - Plumpang</title>

<style>

.sty_pengurus{
    display: flex;
    flex-direction: row;
    overflow: hidden;
    align-items: center;
    height:60vh;
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

.asrama_overflow{
     width: 100%; height: 15em; display: flex; flex-direction: row; justify-content: center; align-items: center; gap: 20px;
}


.kartu{
   margin-top: 5em;
   display: flex;
   flex-direction: column;
   gap: 5px;
   width: 50vw;
}

.kartu p, .kartu b, .kartu .kiri3{
    align-self: start;
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
    object-fit: cover; 
    border-radius: 8px; 
}



@media screen and (max-width: 1027px){
    .asrama_overflow{
        flex-direction: column;
        height: 100vh;
    }

     .kiri, .kanan{
        width: 2em;
    }
     
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

    .stt_ekumene_post{
   margin-top: -5em;
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



<div class="kontainer">
<button class="kiri">&lt;</button>
<button class="kanan">&gt;</button>
</div>


<h1>Pamong Asrama</h1>
<div class="sty_pengurus">
    <div id="scroll" style="overflow: auto; display: flex; width: 100%;">
   @foreach($data->where('status', 'Pengurus Asrama')->where('asrama', 'Plumpang') as $d)
  <div class="card">
    <img src="https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg" alt="Profile" height="300px">
    <p>{{$d->nama}}</p> 
    <p>(Plumpang)</p>
  </div>
  @endforeach

  

  

  </div>


</div>

<center>
 

<div class="asrama_virtual_tour">
    <div class="asrama_overflow">
        <div class="card_virtual">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1753423663728!6m8!1m7!1sxLCwIfYQw8dJ5Z6EYFmGzg!2m2!1d-6.141715547619667!2d106.8869985328759!3f17.565381722592818!4f-17.695584149833167!5f0.7820865974627469"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <b>Plumpang</b>
        </div>
        

        </div>

        </div>

        
    </center>

    <center>
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
    <div class="stt_ekumene_post">
         @foreach($data3->where('posisi_asrama', 'Plumpang') as $d)
        <div class="kartu">
            <b>{{$d->posisi_asrama}}</b>
            <p>{{tgl_indo($d->created_at)}}</p>

           
            <button class="kiri3">&lt;</button>
            <button class="kanan3">&gt;</button>

            <div class="gambar_konten_asrama_stt_ekumene">
                
            @foreach($data2 as $ds)
            <img src="{{asset('storage/' . $ds->foto_kegiatan)}}" alt="">
            @endforeach

            </div>
            <p>{!! nl2br($d->deskripsi) !!}</p>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </div>
       @endforeach

        
        
    </div>
    </center>
    
<script>
    document.querySelector('.kiri').onclick = () => {
        skrol = document.querySelector('#scroll');

        if(skrol.scrollLeft <= 0){
            skrol.scrollTo({
                left:skrol.scrollWidth,
                behavior: 'smooth'
            })
        }else{
            skrol.scrollBy({
                left: -300,
                behavior: 'smooth',
            })
        }
    }

    document.querySelector('.kanan').onclick = () => {
        skrol = document.querySelector('#scroll');
        maxSkrol = skrol.scrollWidth - skrol.clientWidth;

        if(Math.ceil(skrol.scrollLeft) >= maxSkrol){
            skrol.scrollTo({
                left: 0,
                behavior: 'smooth'
            })
        }else{
            skrol.scrollBy({
                left: 300,
                behavior: 'smooth'
            })
        }
    }
    
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
           
            const nilaiScroll = window.matchMedia("(min-width: 1024px)").matches ? 800 : 300;

            container.scrollBy({
                left: nilaiScroll, 
                behavior: 'smooth'
            });
        });
    });
</script>
</div>
