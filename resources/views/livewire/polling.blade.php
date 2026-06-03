<div>
    <style>
        .btn-polling{
            padding: 10px;
            background: #2467e3;
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
        }

        .btn-polling:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 115, 238, 0.6);
        }

        .pol-style{
            padding: 8px;
            background: #fff;
            outline: none;
            border: 1px solid gray;
            border-radius: 5px;
            transition: .5s;
        }

        .pol-style:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 115, 238, 0.6);
        }

        .isi-polling{
            display: flex;
            flex-direction: column;
            gap: 10px; 
        }

        .sub-isi{
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .sub-isi button{
            padding: 10px;
            width: 8%;
            color: #fff;
            border-radius: 5px;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .sub-isi .tambah{
            background:rgb(21, 199, 15);
        }

        
        .sub-isi .kurang{
            background:rgb(221, 11, 11);
        }

        .tambah-tipe-polling{
            display: none;
        }

        .tambah-tipe, .update-hapus-polling{
            margin: 10px;
        }

        .update-hapus-polling{
             display: flex;
            flex-direction: column;
            gap: 10px;
        }


        .sub-polling{
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .tampilan_polling{
            margin: 10px;
        }

        .tampilkan_polling{
            margin: 10px;
            border: 1px solid gray;
            border-radius: 3px;
            padding: 10px;
        }

        .pilih_opsi{
            border: 1px solid gray;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .user {
            box-shadow: 0 0 5px 0.25rem rgba(41, 60, 235, 0.5);
        }

        .check:focus{
            box-shadow: none;
        }
@media screen and (max-width: 800px){
    .tampilkan_polling b{
        font-size: 11px;
        margin: 5px;
    }
}

    </style>
    
    <button class="btn-polling btn-modal">Tambah Poling</button>
    <select name="" class="pol-style">
        <option value="" selected>Pilih Tipe Polling</option>
                    @foreach($data as $d)
                    <option value="{{$d->id_polling}}">{{$d->tipe_polling}}</option>
                    @endforeach
    </select>

    

    <div class="modal-form"></div>

     <div class="blank" style="">
         <p class="keluar_modal2">&times;</p>
        <b>Detail Polling</b> <br><br>
        <hr> <br><br>
        <div class="taruh_status" style="float: right;">
            
        </div>
        <div class="konten-wrapper" style="display: flex; flex-direction: column; gap: 3px;">
            <p>Tunggu Sebentar...</p>
        </div>
    </div>
    
    <div class="input-modal">
         <p id="keluar_modal">&times;</p>
        <div class="form-btn">
        <button class="main-btn">Tambah Polling</button>
        <button class="tipe-polling">Tipe Polling</button>
       
        </div>


        <!-- TAMBAH POLLING -->
        <form action="/tambah_polling" method="POST" class="form-1">
            @csrf
                <select class="pilih-pol-form" name="id_tipe_polling" id="pilih-polling" required>
                    <option value="" disabled selected>Pilih Polling</option>
                    @foreach($data as $d)
                    <option value="{{$d->id_polling}}">{{$d->tipe_polling}}</option>
                    @endforeach
                </select> 
        <br><br>
                <div class="isi-polling">
                    <div class="sub-isi">
                        <input type="text" class="input_opsi" name="opsi_polling[]" placeholder="Isi Polling" required> 
                        <button type="button" class="tambah tbh">+</button>
                        <button type="button" class="kurang">-</button>
                    </div>
                </div>

                <button class="btn-polling" style="float: right; margin: 10px;">Simpan</button>
        </form>

<template id="polling-template">
    <div class="sub-isi">
        <input type="text" class="input_opsi" name="opsi_polling[]" placeholder="Isi Polling" required> 
        <button type="button" class="tambah tbh">+</button>
        <button type="button" class="kurang kr">-</button>
    </div>
</template>


        <!-- TAMBAH TIPE POLLLING!!!!! -->
        <div class="tambah-tipe-polling">
            <form class="tambah-tipe">
                <input type="text" name="tipe_polling" class="input_tipe isi_input" placeholder="Tambah Tipe" required>
                <button class="btn-polling" style="float: right;">Simpan</button>
            </form><br><br>


            
        <!-- UPDATE TIPE POLLLING!!!!! -->
            
                <div class="update-hapus-polling"> 
                    @forelse($data as $d)   
                    <form class="update_tipe_polling update_t{{$d->id_polling}}" id_update="{{$d->id_polling}}">
                    <div class="sub-polling">
                        <input type="hidden" name="id_polling"  value="{{$d->id_polling}}" placeholder="IDS">
                        <input type="text" name="tipe_p" value="{{$d->tipe_polling}}" placeholder="Ubah Polling">
                        <button class="btn-polling" style="background:rgb(223, 209, 26)">Ubah</button>
                        <button type="button" id_update_hapus="{{$d->id_polling}}" class="btn-polling hapus_polling" style="background:rgb(207, 37, 37)">Hapus</button>
                    </div>
                </form>
                @empty
                
                    <center>
                        <p id="kosong">Tidak ada data</p>
                        </center>
                @endif
                </div>
            
        </div>
    </div>


  

 @php
        function tgl_indo($tanggal){
            $bulan = array(
                1 =>
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            );

            $lol = explode('-', $tanggal);
            return $lol[2].' '.$bulan[(int)$lol[1]].' '.$lol[0];
        }
   @endphp

@foreach($data2 as $d)

<div class="tampilkan_polling" id_pilih="{{$d->id}}" id_tipes="{{$d->id_tipe_polling}}">
    <b class="judul_tipe">
        Polling {{$d->TipePolling->tipe_polling}} {{tgl_indo($d->tanggal)}}
        <a style="float: right;" href="#" status="{{$d->status}}" id_opsi="{{$d->id}}" class="klik_detail">Lihat Detail</a>
    </b>
    
    <hr>
    <div class="konten_poll" id_data_polling="{{$d->id}}">
         @if($d->status === "Ditutup")
            <center><br><p>Polling Ditutup Terimakasih :)</p></center>

            @else
        @foreach($data3->where('id_pilih_polling', $d->id) as $ds)
         @php
                        $sudahVote = $data4->where('id_opsi_polling', $ds->id)
                                            ->where('id_pengguna_polling', auth()->user()->id)
                                            ->count() > 0;

                        $vote = $data4->where('id_opsi_polling', $ds->id)
                        ->where('id_pengguna_polling', auth()->id())
                        ->first();

                        $jumlahVote = $data4->where('id_opsi_polling', $ds->id)->count();
                        $persen = $jumlahVote * 100 / 50;
                        
                    @endphp

                <form action="{{ $sudahVote ?  url('/dorm/hapus_user_polling/' . $vote->id) : url('/dorm/user_polling') }}" method="{{$sudahVote ? 'GET' : 'POST'}}">
                @csrf
                <label for="tbl-{{ $ds->id }}">

                    <div class="pilih_opsi {{ $sudahVote ? 'user' : '' }}">
                        <div class="deskripsi_pilih_opsi" style="display: flex;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                background: linear-gradient(
                                                                    to right, 
                                                                    lightblue {{$persen}}%, 
                                                                    white 0%  
                                                                    
                                                                );
                                                                padding: 10px;">
                            <p class="opsi_polling">{{ $ds->opsi_polling }}</p>
                            
                            <p class="persen">
                                {{ $data4->where('id_opsi_polling', $ds->id)->count() }} Orang
                            </p>
                            <input type="hidden" name="id_opsi_polling" value="{{ $ds->id }}">
                            <button style="display: none;" id="tbl-{{ $ds->id }}">Pol</button>
                        </div>
                    </div>
                </label>
            </form>
            @endforeach
            @endif
    </div>
</div>


@endforeach


   
    
<script>
 document.querySelector('.pol-style').addEventListener('change', function() {
        let selectedValue = this.value;  
    

        if(selectedValue.length){
            document.querySelectorAll('.tampilkan_polling[id_tipes]').forEach(div => {
                if(div.getAttribute('id_tipes') !== selectedValue){
                    div.style.display = 'none';
                }else{
                    div.style.display = '';
                }
            })
        }else{
            document.querySelectorAll('.tampilkan_polling[id_tipes]').forEach(div => {
                div.style.display = '';
            })
        }
    });

 document.querySelector('.btn-modal').onclick = function(){
        document.querySelector('.modal-form').style.display = 'block';

        document.querySelector('.input-modal').style.display = 'block';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '1'; 
            document.querySelector('.input-modal').style.opacity = '1';     
        }, 100);
       }

       

       document.querySelector('.modal-form').onclick = function(){
        document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.input-modal').style.display = 'none';

        document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.blank').style.display = 'none';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '0'; 
            document.querySelector('.input-modal').style.opacity = '0';   

            document.querySelector('.blank').style.opacity = '0'; 
        }, 100);
       }

       document.querySelector('.keluar_modal2').onclick = function(){
        document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.blank').style.display = 'none';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '0'; 
            document.querySelector('.blank').style.opacity = '0';     
        }, 100);
       }







       document.querySelectorAll('.klik_detail').forEach(el => {
        el.onclick = function(){
           document.querySelector('.konten-wrapper').innerHTML = `<p>Tunggu Sebentar...</p>`;
           
            id = el.getAttribute('id_opsi');
            status = el.getAttribute('status');
            idz = el.getAttribute('id_pilih');

            fetch('/dorm/detail_polling/' + id + '/', {
                method: 'GET',
            })
            .then(res => res.text())
            .then(html => {
                document.querySelector('.konten-wrapper').innerHTML = html;

                let isChecked = (status === "Dibuka") ? "checked" : "";
                

                document.querySelector('.taruh_status').innerHTML = `
                <label style="margin:10px; cursor:pointer; user-select:none;">
                    <input type="checkbox" class="statuz" ${isChecked} style="margin-right:8px; transform:scale(1.5);">
                    Buka/Tutup Polling
                </label>
                `;
                

                document.querySelector('.statuz').onclick = function(){
                    
                    url = this.checked ? '/dorm/update_status_dibuka_polling/' + id + '/' : '/dorm/update_status_ditutup_polling/' + id + '/';
            

                    fetch(url, {
                        method: 'GET',
                    })
                    .then(res => res.json())
                    .then(data => {
                        Livewire.navigate('/dorm/polling');
                    })
                    .catch(err => {
                        alert('nope');
                    })
                }
            })
            .catch(err => {
                console.log('nope');
            });




            

             document.querySelector('.modal-form').style.display = 'block';

            document.querySelector('.blank').style.display = 'block';

            setTimeout(() => {
                document.querySelector('.modal-form').style.opacity = '1'; 
                document.querySelector('.blank').style.opacity = '1';     
            }, 100);
        }
       })

       document.querySelector('.konten-wrapper').onclick = function(e){
        if(e.target.classList.contains('hapus')){
            ids = document.querySelector('.opsi_polling_style').getAttribute('id_pilih');

            Swal.fire({
            title: "Apakah Anda Ingin Menghapus Data Ini?",
            text: "Mohon Perhatian! Data Yang Terhapus Tidak Dapat Diperbaiki Lagi",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Saja!",
            cancelButtonText: "Tidak"
            }).then((result) => {
            if (result.isConfirmed) {
                fetch('/dorm/hapus_polling/' + ids + '/', {
                    method: 'GET',
                })
                .then(data => {
                    Swal.fire({
                    title: "Terhapus!",
                    text: "File Anda Berhasil Terhapus",
                    icon: "success"
                    });

                    hs = document.querySelector('.tampilkan_polling[id_pilih="'+ids+'"]');
                    hs.remove();

                     document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.input-modal').style.display = 'none';

        document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.blank').style.display = 'none';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '0'; 
            document.querySelector('.input-modal').style.opacity = '0';   

            document.querySelector('.blank').style.opacity = '0'; 
        }, 100);
                })
                .catch(err => {
                    Swal.fire({
                    title: "Jaringan?",
                    text: "Ternyata sinyalnya lag ya... Coba Lagi ok.",
                    icon: "question"
                    }); 
                })
                
            }
            });
        }

        if(e.target.classList.contains('edit')){
             ids = document.querySelector('.opsi_polling_style').getAttribute('id_pilih');
            Livewire.navigate('/dorm/edit_polling/' + ids + '/');
        }
       }


       document.querySelector('#keluar_modal').onclick = function(){
        document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.input-modal').style.display = 'none';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '0'; 
            document.querySelector('.input-modal').style.opacity = '0';     
        }, 100);
       }


document.querySelector('.form-1').onsubmit = function(e){
Swal.fire("Mohon Tunggu...");

    e.preventDefault();
    
    fetch('/tambah_polling', {
        method: 'POST',
        body: new FormData(this),
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}',
        }
    })
    .then(res => res.json())
    .then(data => {
        Swal.fire({
        title: "Good job!",
        text: "Kamu Berhasil Menambahkan Data!",
        icon: "success"
        });
         document.querySelector('.modal-form').style.display = 'none';

        document.querySelector('.input-modal').style.display = 'none';

        setTimeout(() => {
            document.querySelector('.modal-form').style.opacity = '0'; 
            document.querySelector('.input-modal').style.opacity = '0';     
        }, 100);

       const isiPolling = document.querySelector('.isi-polling');

   
    isiPolling.innerHTML = '';

    
    const template = document.querySelector('#polling-template');
    const element = template.content.cloneNode(true);
    isiPolling.appendChild(element);

    location.reload();
    
    })
    .catch(err => {
        Swal.fire({
        title: "Masalah Internet?",
        text: "Coba ulang halaman ini untuk peforma yang lebih baik",
        icon: "question"
        });
    })
}
        
        document.querySelector('.isi-polling').addEventListener('click', (e) => {
            if (e.target && e.target.classList.contains('tbh')) {
                const template = document.querySelector('#polling-template');
                const element = template.content.cloneNode(true);
                document.querySelector('.isi-polling').appendChild(element);
            }

            if (e.target && e.target.classList.contains('kr')) {
                e.target.closest('.sub-isi').remove();
            }
});

document.querySelector('.tipe-polling').onclick = () => {
    document.querySelector('.form-1').style.display = 'none';

    document.querySelector('.main-btn').style.border = 'none';

    document.querySelector('.tipe-polling').style.borderBottom = '3px solid green';

    document.querySelector('.tambah-tipe-polling').style.display = 'block'; 
}

document.querySelector('.main-btn').onclick = () => {

    document.querySelector('.main-btn').style.borderBottom = '3px solid green';

    document.querySelector('.tipe-polling').style.borderBottom = 'none';

    document.querySelector('.form-1').style.display = 'block';

    document.querySelector('.tambah-tipe-polling').style.display = 'none'; 
}



document.querySelector('.tambah-tipe').addEventListener('submit', function(e) {
    e.preventDefault();
    Swal.fire("Mohon Tunggu...");

    fetch('/dorm/tambah_tipe_polling', {
        method: 'POST',
        body: new FormData(this),
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}',
        }
    })
    .then(res => res.json())
    .then(data => {
        
        
        console.log("Sukses:", data);
        document.querySelector('.input_tipe').value = "";
       
        tr = `<form class="update_tipe_polling update_t${data.data.id_polling}" id_update="${data.data.id_polling}">
                <div class="sub-polling">
                <input type="hidden" name="id_polling" value="${data.data.id_polling}" placeholder="IDS">
                <input type="text" name="tipe_p" value="${data.data.tipe_polling}" placeholder="Ubah Polling" required>
                <button class="btn-polling" style="background:rgb(223, 209, 26)">Ubah</button>
                <button type="button" class="btn-polling hapus_polling" id_update_hapus="${data.data.id_polling}" style="background:rgb(207, 37, 37)">Hapus</button>
            </div>
            </form>`
        document.querySelector('.update-hapus-polling').insertAdjacentHTML('beforeend', tr);

        document.querySelectorAll('.update_tipe_polling').forEach(el => {
    el.addEventListener("submit", function(e){
        e.preventDefault();
        id = el.getAttribute('id_update');

        fetch('/dorm/update_tipe_polling/' + id + '/', {
            method: 'POST',
            body: new FormData(el),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            Swal.fire({
            title: "Berhasil!",
            text: "Data Berhasil Diubah",
            icon: "success"
            });

             let option = document.querySelector('#pilih-polling option[value="' + id + '"]');
             let option2 = document.querySelector('.pol-style option[value="' + id + '"]');

                if (option && option2) {
                    option.textContent = data.data.tipe_polling;
                    option2.textContent = data.data.tipe_polling;
                }
        })
        .catch(err => {
            Swal.fire({
            title: "Masalah Internet?",
            text: "Coba ulang halaman ini untuk performa yang lebih baik",
            icon: "question"
            });
        })
    })

    document.querySelectorAll('.hapus_polling').forEach(del => {
    del.onclick = (el) => {   

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
        });
        swalWithBootstrapButtons.fire({
        title: "Data Ingin Dihapus",
        text: "Apakah anda yakin ingin menghapus data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Hapus!",
        cancelButtonText: "Tidak",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {

             id = del.getAttribute('id_update_hapus');

                fetch('/dorm/hapus_polling_tipe/' + id, {
                    method: 'GET',
                })
                .then(data => {
                    var top = document.querySelector(".update_t" + id);
                    top.style.display = 'none';

                    let option = document.querySelector('#pilih-polling option[value="' + id + '"]');
                    let option2 = document.querySelector('.pol-style option[value="' + id + '"]');
                    let tampilan = document.querySelector('.tampilkan_polling[id_tipes="' + id + '"]');

                        if (option && option2) {
                            option.style.display = 'none';
                            option2.style.display = 'none';
                        }

                        if(tampilan){
                       tampilan.style.display = 'none';
                }

                   swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                })  
                .catch(err => {
                    alert('nope');
                })
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
            title: "Dibatalkan!",
            text: "Data yang tersimpan aman :)",
            icon: "error"
            });
        }
        });

       
    }
})

})

        let opsi = document.createElement('option');
        opsi.value = data.data.id_polling;
        opsi.textContent = data.data.tipe_polling;

        document.querySelector('.pilih-pol-form').appendChild(opsi);
        
        let opsiClone = opsi.cloneNode(true);
        document.querySelector('.pol-style').appendChild(opsiClone);
        
       
        Swal.fire({
        title: "Berhasil!",
        text: "Tipe Data Ditambahkan!",
        icon: "success"
        });

        document.querySelector('#kosong').style.display = 'none';
    })
    
    .catch(err => console.error("Error:", err));
});

document.querySelectorAll('.update_tipe_polling').forEach(el => {
    el.addEventListener("submit", function(e){
        e.preventDefault();
        id = el.getAttribute('id_update');

        fetch('/dorm/update_tipe_polling/' + id + '/', {
            method: 'POST',
            body: new FormData(el),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            alert('Berhasil');

              let option = document.querySelector('#pilih-polling option[value="' + id + '"]');
             let option2 = document.querySelector('.pol-style option[value="' + id + '"]');

                if (option && option2) {
                    option.textContent = data.data.tipe_polling;
                    option2.textContent = data.data.tipe_polling;
                }
        })
        .catch(err => {
            alert('nope');
        })
    })
})

document.querySelectorAll('.hapus_polling').forEach(del => {
    del.onclick = (el) => {   
        id = del.getAttribute('id_update_hapus');

        const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger"
  },
  buttonsStyling: true
});
swalWithBootstrapButtons.fire({
  title: "Apakah Anda Yakin?",
  text: "Jika anda menghapus tipe polling ini, maka data polling yang berjenis data ini akan terhapus secara bersamaan!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: "Ya, Hapus!",
  cancelButtonText: "Tidak",
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: "Terhapus!",
      text: "File Anda Terhapus!",
      icon: "success"
    });

     fetch('/dorm/hapus_polling_tipe/' + id, {
            method: 'GET',
        })
        .then(data => {
            
            let tampilan = document.querySelector('.tampilkan_polling[id_tipes="' + id + '"]');

            var top = document.querySelector(".update_t" + id);
            top.style.display = 'none';

            let option = document.querySelector('#pilih-polling option[value="' + id + '"]');
            let option2 = document.querySelector('.pol-style option[value="'+id+'"]');
        
                if (option && option2) {
                    option.style.display = 'none';
                    option2.style.display = 'none';
                }

                if(tampilan){
                       tampilan.style.display = 'none';
                }

        })  
        .catch(err => {
            alert('Bermasalah pada Jaringan!');
        })
  } else if (
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Dibatalkan",
      text: "File Anda Tersimpan :)",
      icon: "error"
    });
  }
});

       
    }
})


    </script>
</div>
