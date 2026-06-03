<div>
    <style>
        .opsi_polling_style{
            margin: 10px;
        }

         .edit{
            padding: 10px;
            background:rgb(238, 162, 20);
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        .edit:focus{
            box-shadow: 0 0 0 0.25rem rgba(215, 238, 7, 0.6);
        }

        .hapus{
            padding: 10px;
            background:rgb(227, 58, 36);
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        .hapus:focus{
            box-shadow: 0 0 0 0.25rem rgba(148, 14, 14, 0.6);
        }

        .detail_tiap_kamar{
            padding: 10px;
            background:rgb(65, 36, 227);
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        .detail_tiap_kamar:focus{
            box-shadow: 0 0 0 0.25rem rgba(14, 110, 148, 0.6);
        }

        @media(max-width: 820px){
            .opsi_polling_style{
                 width: 150%;
            }
        }

    </style>

     <div class="tombol">
         <button class="edit">Edit</button>
         <button class="hapus">Hapus</button>
     </div>
     
     

     @foreach($data as $d)
        @foreach($data2->where('id_pilih_polling', $d->id) as $ds)
        <div class="opsi_polling_style" id_pilih="{{$d->id}}">
            <b>{{ $ds->opsi_polling }}</b>
            <hr> <br>

            @forelse($data3->where('id_opsi_polling', $ds->id)->groupBy('pengguna.kamar') as $kamar => $items)
            <b>{{ $kamar }}</b> <br>
            @foreach($items as $dz)
                <li>{{ $dz->pengguna->nama }}</li>
            @endforeach
            <br>
        @empty
            <p>Data Kosong</p> <br>
        @endforelse
        </div>
        @endforeach
     @endforeach
    </div>

     


