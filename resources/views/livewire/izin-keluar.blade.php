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
    .tampilkan_izin_keluar{
        background: blue;
        padding: 10px;
        width: 30%;
        border-radius: 10px;
    }
</style>

    <div class="upload_konten">
        <div class="upload_konten2">
        <label for="upload">
            <b>Izin Keluar</b>
            <form wire:submit="tambah_izin">
            <div class="plus">
                <i class="fas fa-plus"></i>
            </div>
            

            <input type="file" style="display: none;" wire:model="foto" id="upload"  accept=".jpg, .png, .jpeg">
        </label> <br><br>

        <center>
        <div class="tampilkan_gambar" id="preview">
            @if($foto)  
                <img src="{{ $foto->temporaryUrl() }}" alt="preview" width="500">
            @endif
        </div>
        </center>

        
        <div class="deskripsi_konten">
            <textarea wire:model="deskripsi" placeholder="Mau Pergi Kemana?" id="deskripsi" required></textarea>
            <button class="tombol"><i class="fas fa-paper-plane" style="float: right;"></i></button>
        </div>

        </form>
    </div>
    </div>

    @foreach($data as $d)
    <center>
        <div class="tampilkan_izin_keluar">
        <img src="{{asset('storage/' . $d->foto_belum_berangkat)}}" height="200" width="215" alt="">
        </div>
    </center>
    @endforeach
</div>
