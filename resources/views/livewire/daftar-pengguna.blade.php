<div>
<style>
    .gbr{
        height: 35em; margin-top: 12em;margin-left: 10em;
    }

    select, input{
        margin: 10px;
    }

    .datas{
        width: 100%;
        overflow: auto;
    }

    @media(max-width: 752px){
        .gbr{
            height: 25em;
            margin-left: 0;
            margin-top: 20em;
            width: 95%;
        }
    }
</style>

<select name="" id="" class="pilih_angkatan">
    <option value="">Angkatan</option>
    @for ($i = 2022; $i <= now()->year; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>

<select name="" id="" class="asrama_pilih">
    <option value="">Asrama</option>
    <option value="Plumpang">Plumpang</option>
    <option value="TC (Tipar Cakung)">TC (Tipar Cakung)</option>
    <option value="Kirana">Kirana</option>
</select>

<input type="text" class="input_nama" placeholder="Cari Nama...">

<div class="datas">
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Foto Profil</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Angkatan</th>
            <th>Prodi</th>
            <th>Status</th>
            <th>Asrama</th>
            <th>Kamar</th>
            <th>Kontrol</th>
        </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp

            @forelse($data as $d)
            <tr class="data" tahun="{{$d->angkatan}}" ids="{{$d->id}}" asrama="{{$d->asrama}}" nama="{{$d->nama}}">
                <td>{{$no++}}</td>
                @if($d->foto_profil === "NULL")
                <td><img src="https://openclipart.org/image/2000px/247319" height="50" width="50" style=" cursor: pointer;"></td>
                @else
                <td><img class="klik_gbr" id_gambar="{{$d->id}}" src="{{asset('storage/' . $d->foto_profil)}}" height="50" width="50" style="border-radius: 30em; cursor: pointer;" alt=""></td>
                @endif

                <td>{{$d->nim}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->angkatan}}</td>
                <td>{{$d->prodi}}</td>
                <td>{{$d->status}}</td>
                <td>{{$d->asrama}}</td>
                <td>{{$d->kamar}}</td>
                <td><a href="/dorm/edit_pengguna/{{$d->id}}/" style="color: orange;" wire:navigate><i class="fas fa-edit"></i></a> <a href="#" class="hapus" id_hapus="{{$d->id}}" style="color: red;"><i class="fas fa-trash"></i></a></td>
            </tr>
            @empty
            <tr>
                <td>Data Ini Kosong...</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<center>
    <div class="modal-form">

    
    <div class="show_gambar">

    </div>
    
    </div>
</center>

    

    <script>

        document.querySelectorAll('.hapus').forEach(function(el) {
            el.onclick = () => {
                ids = el.getAttribute('id_hapus');

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
                    fetch('/dorm/hapus_pengguna/' + ids + '/', {
                        method: 'GET',
                    })
                    .then(data => {
                        tr = document.querySelector('.data[ids="'+ids+'"]');
                        tr.remove(); 


                            Swal.fire({
                            title: "Terhapus!",
                            text: "Data Anda berhasil dihapus!",
                             icon: "success"
                            });
                    })
                    .catch(err => {
                        alert('Koneksi Internet bermasalah!');
                    })
                }
                });
            }
        })

        
       function filterData() {
    let tahun = document.querySelector('.pilih_angkatan').value.toLowerCase();
    let asrama = document.querySelector('.asrama_pilih').value.toLowerCase();
    let nama = document.querySelector('.input_nama').value.toLowerCase();

    document.querySelectorAll('.data').forEach(row => {
        let rowTahun = row.getAttribute('tahun').toLowerCase();
        let rowAsrama = row.getAttribute('asrama').toLowerCase();
        let rowNama = row.getAttribute('nama').toLowerCase();

        let tampil = true;

        if (tahun && rowTahun !== tahun) {
            tampil = false;
        }

        if (asrama && rowAsrama !== asrama) {
            tampil = false;
        }

        if (nama && !rowNama.includes(nama)) {
            tampil = false;
        }

        row.style.display = tampil ? '' : 'none';
    });
}


document.querySelector('.pilih_angkatan').addEventListener('change', filterData);
document.querySelector('.asrama_pilih').addEventListener('change', filterData);
document.querySelector('.input_nama').addEventListener('input', filterData);


        document.querySelector('.modal-form').onclick = function(){
            document.querySelector('.modal-form').style.display = 'none';
            document.querySelector('.show_gambar').style.display = 'none';
                
                setTimeout(function(){
                    document.querySelector('.modal-form').style.opacity = '0';
                }, 100);
        }

        document.querySelectorAll('.klik_gbr').forEach(el => {
            el.onclick = function(){
                ids = el.getAttribute('id_gambar');

                document.querySelector('.show_gambar').style.display = 'block';

                fetch('/dorm/show_gambar/' + ids + '/', {
                    method: 'GET',
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector('.show_gambar').innerHTML = `<img src="/storage/${data.data.foto_profil}" class="gbr">`;
                    document.querySelector('.show_gambar').style.marginTop = '-10em';
                })
                .catch(err => {
                    console.log('nope');
                })
                document.querySelector('.modal-form').style.display = 'block';
                
                setTimeout(function(){
                    document.querySelector('.modal-form').style.opacity = '1';
                }, 100);
            }
        })
    </script>
</div>
