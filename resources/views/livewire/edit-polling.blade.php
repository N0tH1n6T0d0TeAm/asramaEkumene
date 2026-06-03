<div>
    <style>
        .kontenz{
            margin:10px;
        }

        .edit{
            padding: 10px;
            background:rgb(20, 24, 238);
            outline: none;
            color: #fff;
            border:none;
            border-radius: 5px;
            cursor: pointer;
            transition: .5s;
            float: right;
        }

         .edit:focus{
            box-shadow: 0 0 0 0.25rem rgba(7, 11, 238, 0.6);
        }
    </style>

    <p> <a href="/dorm/polling" wire:navigate><i class="fas fa-arrow-left"></i></a> Edit Polling Makan </p>
    <hr>
    
    @foreach($data as $d)
    <form class="form" ids="{{$d->id}}">
        <div class="kontenz">
                <input type="text" name="opsi_polling" value="{{$d->opsi_polling}}">
        </div>
        <button class="edit">Simpan</button>
     </form> <br> <br>
    @endforeach


     <script>
       document.querySelectorAll('.form').forEach(el => {
        el.onsubmit = function(e){
            e.preventDefault();
            ids = el.getAttribute('ids');
            fetch('/dorm/update_polling/' + ids + '/', {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    title: "Disimpan!",
                    text: `Data anda berhasil di ubah menjadi ${data.data.opsi_polling}`,
                    icon: "success"
                    });
            })
            .catch(err => {
                alert('nope');
            })
        }
       })
     </script>
</div>
