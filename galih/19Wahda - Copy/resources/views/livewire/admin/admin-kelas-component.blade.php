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

            <a class="btn btn-primary" href="{{ route('admin.kelas.add') }}">Tambah Kelas</a>
            <a class="btn btn-primary ms-3" href="{{ route('admin.deleted.kelas') }}">Kelas Dihapus</a>
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="card mt-4">
                <h5 class="card-header">All Kelas</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = ($kelas->currentPage()-1) * $kelas->perPage();
                        @endphp
                        @foreach($kelas as $m)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$m->name}}</strong></td>
                                <td>
                                    <a class="dropdown-item" href="{{route('admin.kelas.edit',['kelas_id'=>$m->id])}}"
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
                  {{$kelas->links()}}
                </div>
            </div>

        </div>

    </div>
</div>

