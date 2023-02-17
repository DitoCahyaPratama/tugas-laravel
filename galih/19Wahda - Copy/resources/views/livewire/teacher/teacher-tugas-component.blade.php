<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block;
        }
        .list {
            list-style: none;
        }
    </style>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <a class="btn btn-primary" href="{{ route('teacher.tugas.add') }}">Tambah Tugas</a>
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="card mt-4">
                <h5 class="card-header">Semua Tugas</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Tenggat Waktu</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = ($tugas->currentPage()-1) * $tugas->perPage();
                        @endphp
                        @foreach($tugas as $m)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$m->name}}</strong></td>
                                <td>{{$m->status}}</td>
                                <td>{{$m->deadline}}</td>
                                <td>
                                    @if($m->status === 'tertunda')
                                        <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{$m->id}},'aktif')"
                                            ><i class="bx bx-download me-1"></i> Aktif</a
                                        >
                                    @elseif($m->status === 'aktif')
                                        <a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{$m->id}},'tertunda')"
                                            ><i class="bx bx-download me-1"></i> Tertunda</a
                                        >
                                    @endif
                                    <button class="dropdown-item detail_tugas" value="{{$m->id}}"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$m->id}}"><i class="bx bx-detail me-1"></i> Detail</button>
                                    <a class="dropdown-item" href="{{route('teacher.tugas.edit',['tugas_id'=>$m->id])}}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="#" onclick="return confirm('are you really?') || event.stopImmediatePropagation()" wire:click.prevent="delete({{$m->id}})"
                                        ><i class="bx bx-trash me-1"></i> Hapus</a
                                    >
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$tugas->links()}}
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Murid Yang Sudah Mengerjakan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody id="a">
            @php
                $i = 1;
            @endphp
               
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- <script>
    $(document).ready(function(){
        $('.detail_tugas').click(function(){
            var id = $(this).val();
            var url_detail = "{{route('teacher.tugas.done', ':id')}}";
            url_detail = url_detail.replace(':id', id);
            $.ajax({
                type : 'GET',
                url : url_detail,
                success:function(response){
                    $('#a').empty();
                    $.each(reponse.data , function(key,item){
                        $("#a").append('<tr> \
                                <td>'+item.id+'</td>\
                                <tr>');
                    })
                }
            })
        })
    });
</script> -->

<script>
   $(document).on('click', '.detail_tugas', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/teacher/tugas/selesai/'+id,
            success: function (data) {
                $('#a').empty();
                $.each(data , function(key,item){
                    $("#a").append('<tr> \
                        <td>'+{{$i++}}+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+new Date(item.created_at).toLocaleDateString()+'</td>\
                        <tr>'
                    );
                })
            }
        });
    });

</script>