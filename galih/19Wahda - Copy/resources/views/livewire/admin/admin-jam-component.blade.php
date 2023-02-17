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

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add">
        Tambah Jam
    </button>

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
                        <th>Keterangan</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($jam->currentPage()-1) * $jam->perPage();
                        @endphp
                        @foreach($jam as $j)
                            <tr>
                                <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{++$i}}</strong>
                                </td>
                                <td>{{$j->name}}</td>
                                <td><span class="badge bg-label-primary me-1">{{$j->jam_mulai}}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{$j->jam_selesai}}</span></td>
                                <td>
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#detail" wire:click="detailJam({{$j->id}})"
                                        ><i class="bx bx-detail me-1"></i> Detail</button
                                    >
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#edit" wire:click="editJam({{$j->id}})"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</button
                                    >
                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#delete" wire:click="deleteJam({{$j->id}})"
                                        ><i class="bx bx-trash me-1"></i> Delete</button
                                    >
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$jam->links()}}
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL ADD -->
    <div wire:ignore.self class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jam</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent="addJam">
                    <div class="mt-3 mb-3">
                        <label for="name">Nama</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="mulai">Jam Mulai</label>
                        <input type="time" id="mulai" class="form-control" wire:model="mulai">
                        @error('mulai')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="selesai">Jam Selesai</label>
                        <input type="time" id="selesai" class="form-control" wire:model="selesai">
                        @error('selesai')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- MODAL DETAIL -->
    <div wire:ignore.self class="modal fade" id="detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Jam</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mt-3 mb-3">
                        <label for="name">Nama : </label>
                        <h5>{{$name}}</h5>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="mulai">Jam Mulai : </label>
                        <h5>{{$mulai}}</h5>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="selesai">Jam Selesai :</label>
                        <h5>{{$selesai}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- MODAL EDIT -->
     <div wire:ignore.self class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Rubah Jam</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent="editJamm">
                    <div class="mt-3 mb-3">
                        <label for="name">Nama</label>
                        <input type="text" id="name" class="form-control" wire:model="name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="mulai">Jam Mulai</label>
                        <input type="time" id="mulai" class="form-control" wire:model="mulai">
                        @error('mulai')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="selesai">Jam Selesai</label>
                        <input type="time" id="selesai" class="form-control" wire:model="selesai">
                        @error('selesai')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

     <!-- MODAL DELETE -->
     <div wire:ignore.self class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Jam</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:click.prevent="deleteJamm">
                    <h6>Kamu Yakin Mau Hapus Data Jam Ini?</h6>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>