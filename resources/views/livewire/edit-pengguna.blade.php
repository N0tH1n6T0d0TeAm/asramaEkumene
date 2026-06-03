<div>

<style>

.editPengguna{
    display: flex;
    flex-direction: column;
    margin-top: 3em;
    gap: 10px;
}

.editPengguna .gambar{
    height: 10em;
    width: 10em;
    cursor: pointer;
}

.btn-polling{
            padding: 10px;
            background: #2467e3;
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
            font-size: 15px;
            width: 20%;
        }

        .btn-polling:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 115, 238, 0.6);
        }
</style>

    <a href="/dorm/daftar_pengguna" wire:navigate style="color: black;"><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="editPengguna">
        <form wire:submit="update">
        <input type="hidden" wire:model="id" value="{{$data->id}}">

        <center>
            <label for="foto_file">
                @if($foto)
                <img src="{{$foto->temporaryUrl()}}" alt="{{$data->nama}}" class="gambar">
                <input type="file" style="display: none;" wire:model="foto" accept=".jpg,.jpeg" id="foto_file">
                @elseif($data->foto_profil === "NULL")
                <img src="https://openclipart.org/image/2000px/247319" class="gambar" style=" cursor: pointer;">
                <input type="file" style="display: none;" wire:model="foto" accept=".jpg,.jpeg" id="foto_file">
                @else
                    <img src="{{asset('storage/' . $data->foto_profil)}}" alt="{{$data->nama}}" class="gambar">
                <input type="file" style="display: none;" wire:model="foto" accept=".jpg,.jpeg" id="foto_file">
                @endif
            </label>
        </center>

        <input type="text" wire:model="nama_lengkap" placeholder="Nama Lengkap" required>

        <select wire:model="angkatan" id="" required>
            <option value="" disabled selected>Angkatan</option>
            @for($i = 2022; $i <= 2025; $i++)
            @if($data->angkatan == $i)
            <option value="{{$i}}" selected>{{$i}}</option>
            @else
            <option value="{{$i}}">{{$i}}</option>
            @endif
            
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
                <option value="Pengurus Asrama">Pengurus Asrama</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Gembala Kamar Besar">Gembala Kamar Besar</option>
                <option value="Gembala Kamar Kecil">Gembala Kamar Kecil</option>
                <option value="Anggota Kamar">Anggota Kamar</option>
            </select>

            <input type="text" wire:model="kamar" placeholder="Kamar">

            <input type="text" wire:model="password" placeholder="Password">

            <center>
                <button class="btn-polling">Simpan</button>
            </center>
            </form>
        </div>

        <script>
            window.addEventListener('sukses', () => {
                Swal.fire({
                title: "Berhasil Diubah!",
                icon: "success",
                draggable: true
                });
            })
        </script>
</div>
