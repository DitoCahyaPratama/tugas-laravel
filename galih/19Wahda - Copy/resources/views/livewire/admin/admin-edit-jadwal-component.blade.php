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
    <div class="container mt-3">

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif

        <div class="card">
            <h5 class="card-header"></h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-bordered mb-5">
                    <thead>
                    <tr>
                        <th style="width:10px">No</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Pelajaran</th>
                        <th>Teacher</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($jadwal as $j)
                            <tr>
                                <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$i++}}</strong>
                                </td>
                                <td><span class="badge bg-label-primary me-1">{{$j->kelas}} {{$j->subkelas}}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{$j->hari}}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{$j->jam}}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{$j->mapel}}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{$j->teacher}}</span></td>
                                <td>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click.prevent="tampiljadwal({{$j->id}})">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </button>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#delete" wire:click="deleteJam({{$j->id}})"
                                        ><i class="bx bx-trash me-1"></i> Delete</button
                                    >
                                </td>
                            </tr>

                            
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editJadwall">
                        <div class="mb-3 mt-3">
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="mapel" class="form-control" id="mapel" wire:model="mapel_id">
                                @foreach($mapel1 as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="teacher">Guru</label>
                            <select name="teacher" class="form-control" id="teacher" wire:model="teacher_id">
                                @foreach($teacher1 as $m)
                                    <option value="{{$m->id}}">{{$m->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Rubah</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>

    </div>
</div>
