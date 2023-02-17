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

            <a class="btn btn-primary" href="{{ route('admin.student.add') }}">Tambah Murid</a>
            <a class="btn btn-primary ms-3" href="{{ route('admin.deleted.student') }}">Murid Dihapus</a>
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="card mt-4">
                <h5 class="card-header">All Student</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = ($student->currentPage()-1) * $student->perPage();
                        @endphp
                        @foreach($student as $m)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$m->user->name}}</strong></td>
                                <td>{{$m->user->email}}</td>
                                <td>{{$m->phone}}</td>
                                <td>{{$m->subkelas->kelas->name}}  {{$m->subkelas->name}}</td>
                                <td><img src="{{asset('assets/Student')}}/{{$m->image}}" alt="{{$m->user->name}}" width="100"></td>
                                <td>
                                    <a class="dropdown-item" href="{{route('admin.student.reset-password',['user_id'=> $m->user->id])}}"
                                        ><i class="bx bx-download me-1"></i> Atur Ulang Password</a
                                    >
                                    <a class="dropdown-item" href="{{route('admin.student.edit',['student_id'=>$m->id])}}"
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
                  {{$student->links()}}
                </div>
            </div>

        </div>

    </div>
</div>
