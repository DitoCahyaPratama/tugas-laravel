<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card mb-4">
            @if(Session::has('message'))
                <div class="alert alert-danger mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
                <h5 class="card-header">Tambah Guru</h5>
                <form action="" wire:submit.prevent="addStudent">
                    <div class="card-body">
                        <div>
                            <label for="name" class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Name"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="name"
                            />
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input
                                type=""
                                class="form-control"
                                id="email"
                                placeholder="Email"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="email"
                            />
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                placeholder="password"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="password"
                            />
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="confirm_password" class="form-label">Password Konfirmasi</label>
                            <input
                                type="password"
                                class="form-control"
                                id="confirm_password"
                                placeholder="confirm_password"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="confirm_password"
                            />
                            @error('confirm_password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="form-label">Nomor Telfon</label>
                            <input
                                type="text"
                                class="form-control"
                                id="phone"
                                placeholder="phone"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="phone"
                            />
                            @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="img" class="form-label">Foto Guru</label>
                            <input
                                type="file"
                                class="form-control"
                                id="img"
                                placeholder="Image"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="img"
                            />
                            @if($img)
                                <img src="{{$img->temporaryUrl()}}" width=120>
                            @endif
                            @error('img')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="kelas_id" class="form-label mt-4">Kelas</label>
                            <select name="kelas_id" id="kelas_id" wire:model="kelas_id" class="form-control">
                                <option value="">Select Kelas</option>
                                @foreach($kelas as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="subkelas_id" class="form-label mt-4">Sub Kelas</label>
                            <select name="subkelas_id" id="subkelas_id" wire:model="subkelas_id" class="form-control">
                                <option value="">Select Sub Kelas</option>
                                @foreach($subkelas as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                            @error('subkelas_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="mapel_id" class="form-label mt-4">Mata Pelajaran</label>
                            <select name="mapel_id" id="mapel_id" wire:model="mapel_id" class="form-control">
                                <option value="">Select Kelas</option>
                                @foreach($mapel as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary mt-4">Tambah Guru</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>


