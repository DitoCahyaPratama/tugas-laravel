<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <a class="btn btn-primary" href="{{ route('admin.student') }}">Kembali</a>
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="card mt-4">
                <h5 class="card-header">Semua Murid Dihapus</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($student as $m)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$m->users->name}}</strong></td>
                                <td>{{$m->users->email}}</td>
                                <td>
                                    @if(isset($m->subkelas->kelas->name))
                                        {{$m->subkelas->kelas->name}}  {{$m->subkelas->name}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a class="dropdown-item" href="#" onclick="return confirm('are you really?') || event.stopImmediatePropagation()" wire:click.prevent="restore({{$m->id}}, {{$m->users->id}})"
                                        ><i class="bx bx-undo me-1"></i> Pulihkan</a
                                    >
                                    <a class="dropdown-item" href="#" onclick="return confirm('are you really to delete permanently?') || event.stopImmediatePropagation()" wire:click.prevent="forceDelete({{$m->id}}, {{$m->users->id}})"
                                        ><i class="bx bx-trash me-1"></i> Hapus</a
                                    >
                                </td>
                            </tr>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>

        </div>

    </div>
</div>

