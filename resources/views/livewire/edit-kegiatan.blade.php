<div>
    <style>
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

        .foto_data{
            display: flex;
            flex-direction: row;
            gap: 10px;
            overflow: auto;
        }

        .foto_data img{
            cursor: pointer;
        }

        .foto_data p{
            position: relative;
            left: 11em;
            font-size: 15px;
            background: #fff;
            padding: 10px;
            height: 10px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            user-select: none;
        }

        .deskripsi{
            margin-top: 10px;
        }

         .deskripsi .tombol{
        position: relative;
        left: -4px;
        margin-top: -30px;
        float: right;
        padding: 4px;
        background: none;
        cursor: pointer;
        border: none;
    }
    </style>

    <a href="/dorm/publikasi_kegiatan" wire:navigate><button class="btn">Kembali</button></a> <br><br><br>

    
    
<div class="foto_data">
    @foreach($data2->where('id_kegiatan', $data->id) as $d)
    <!-- <p class="hapus_foto" del="{{$d->id}}">&times;</p> -->
    <form action="/dorm/ubah_foto_kegiatan/{{$d->id}}" method="POST" class="update_fotoz" enctype="multipart/form-data">
        @csrf
        <label for="gambar{{$d->id}}" class="update_foto" style="margin-top: 10px;">
            <img height="100" width="150" src="{{asset('storage/' . $d->foto_kegiatan)}}" alt="">
            <input onchange="this.form.submit()" type="file" accept=".jpg, .png, .jpeg" name="foto" ids="{{$d->id}}" style="display: none;" id="gambar{{$d->id}}">
        </label>
    </form>

        @endforeach
    </div>

    <div class="deskripsi">
            <form class="form">
            @csrf
        <input type="datetime-local" name="tanggal" value="{{$data->created_at}}" id="" style="width: 100%;"> <br><br>
         <select name="asrama" id="" style="width: 100%;"><br><br>
                <option value="Semua">Semua</option>
                @if(Auth::user()->asrama == "Plumpang")
                <option value="Plumpang" selected>Plumpang</option>

                @elseif(Auth::user()->asrama == "TC (Tipar Cakung)")
                <option value="TC (Tipar Cakung)" selected>TC (Tipar Cakung)</option>

                @elseif(Auth::user()->asrama == "Kirana")
                <option value="Kirana" selected>Kirana</option>
                @endif
            </select><br><br>
        <textarea name="deskripsi" placeholder="Deskripsi">{{$data->deskripsi}}</textarea>
        <button class="tombol"><i class="fas fa-paper-plane" style="float: right;"></i></button>

        </form>
    </div>

    <script>
        document.querySelector('.form').addEventListener('submit', function(el) {
              el.preventDefault();

            fetch('/dorm/update_publikasi_kegiatan/' + {{$data->id}} + '/', {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                }
            })
            .then(data => {
                Swal.fire({
                title: "Good job!",
                text: "Kamu Berhasil Menambahkan Data!",
                icon: "success"
                });
            })
            .catch(err => {
                Swal.fire({
                title: "Masalah Internet!",
                text: "Mohon Periksa Sinyal Internet Anda!",
                icon: "info"
                });
            })
        })
    </script>
</div>