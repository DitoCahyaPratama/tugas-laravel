<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card mb-4">
                <h5 class="card-header">Edit Tugas</h5>
                <form action="" wire:submit.prevent="editTugas">
                    <div class="card-body">
                        <div>
                            <label for="name" class="form-label">Judul</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Judul"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="name"
                            />
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>      
                        <div>
                            <label for="soal" class="form-label mt-4">Soal</label>
                            <input
                                type="text"
                                class="form-control"
                                id="Soal"
                                placeholder="Soal"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="soal"
                            />
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>    
                        <div>
                            <label for="description" class="form-label mt-4">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" wire:model="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>  
                        <div>
                            <label for="img" class="form-label mt-4">File Bab</label>
                            <input
                                type="file"
                                class="form-control"
                                id="img"
                                placeholder="Materi Name"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="nwfile"
                            />
                            @if($nwfile)
                                <p>{{$nwfile}}</p>
                            @else
                                <p>{{$file}}</p>
                            @endif
                            @error('nwfile')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="status" class="form-label mt-4">Status</label>
                            <select name="status" id="status" wire:model="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tertunda">Tertunda</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="date" class="form-label mt-4">Tenggat Waktu</label>
                            <input
                                type="datetime-local"
                                class="form-control"
                                id="date"
                                placeholder="DeadLine"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="deadline"
                            />
                            @error('deadline')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>      
                        <div>
                            <button class="btn btn-primary mt-4">Edit Tugas</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
