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
        
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add">
                Tambah Jadwal
            </button>
            <div class="row gx-3 gy-2 align-items-center">
                <div class="col-md-3">
                    <label class="form-label" for="selectTypeOpt">Kelas</label>
                        <select id="selectTypeOpt" class="form-select color-dropdown" wire:model="search_kelas">
                            @foreach($sk as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="selectPlacement">Sub Kelas</label>
                        <select id="selectTypeOpt" class="form-select color-dropdown" wire:model="search_sub_kelas">
                            @foreach($ssk as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </select>
                </div>
                <div class="col-mb-3 mt-3">
                    <a class="btn btn-primary" href="{{route('admin.jadwal.edit', ['kelas_id'=>$search_kelas, 'subkelas_id'=>$search_sub_kelas])}}">Edit Jadwal</a>
                </div>
            </div>
        </div>


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
                        <th></th>
                        @foreach($hari1 as $h)
                            <th>{{$h->name}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $hari_id => $jadwal_hari)
                    <tr>
                        <td>{{ $daftar_hari[$hari_id] }}</td>
                        @foreach($jadwal_hari as $jadwal)
                        <td>
                            <button type="button" class="dropdown-item" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="Teacher : <span>{{ $jadwal['teacher'] }}</span>">
                                {{ $jadwal['mapel'] }}
                            </button>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL ADD -->
    <div wire:ignore.self class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent="addJadwal">
                    <div class="mt-3 mb-3">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control" wire:model="kelas_id">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="subkelas">Sub Kelas</label>
                        <select name="subkelas" id="subkelas" class="form-control" wire:model="subkelas_id">
                            <option value="">Pilih Sub Kelas</option>
                            @foreach($subkelas as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                        @error('subkelas_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="hari">Hari</label>
                        <select name="hari" id="hari" class="form-control" wire:model="hari_id">
                            <option value="">Pilih Hari</option>
                            @foreach($hari as $h)
                                <option value="{{$h->id}}">{{$h->name}}</option>
                            @endforeach
                        </select>
                        @error('hari_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="jam">Jam</label>
                        <select name="jam" id="jam" class="form-control" wire:model="jam_id">
                            <option value="">Pilih Jam</option>
                            @foreach($jam as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                        @error('jam_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-control" wire:model="mapel_id">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach($mapel as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="guru">Guru</label>
                        <select name="guru" id="guru" class="form-control" wire:model="guru_id">
                            <option value="">Pilih Guru</option>
                            @foreach($teacher as $k)
                                <option value="{{$k->id}}">{{$k->user->name}}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>