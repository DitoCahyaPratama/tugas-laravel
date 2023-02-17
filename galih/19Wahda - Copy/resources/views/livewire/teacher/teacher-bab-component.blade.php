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

            <a class="btn btn-primary" href="{{ route('teacher.bab.add') }}">Tambah Bab</a>
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="card mt-4">
                <h5 class="card-header">Semua Bab</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Materi</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = ($bab->currentPage()-1) * $bab->perPage();
                        @endphp
                        @foreach($bab as $m)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$m->name}}</strong></td>
                                <td>{{$m->materi->name}}</td>
                                <td><span class="badge bg-label-primary me-1">{{$m->description}}</span></td>
                                <td>  {{$m->file}}  </td>
                                <td>
                                    <a class="dropdown-item" href="{{url('assets/bab/'.$m->file)}}"  target="_blank"
                                        ><i class="bx bx-download me-1"></i> Unduh</a
                                    >
                                    <a class="dropdown-item" href="{{route('teacher.bab.edit',['bab_id'=>$m->id])}}"
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
                  {{$bab->links()}}
                </div>
            </div>

        </div>

    </div>
</div>
