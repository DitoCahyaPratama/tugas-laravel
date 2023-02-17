<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card mb-4">
                <h5 class="card-header">Edit Materi</h5>
                <form action="" wire:submit.prevent="editMateri">
                    <div class="card-body">
                        <div>
                            <label for="name" class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Materi Name"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="name"
                            />
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="desc" class="form-label mt-4">Deskripsi</label>
                            <textarea 
                                name="desc" 
                                id="desc"
                                class="form-control"
                                placeholder="Materi Description"
                                wire:model="desc">
                            </textarea>
                            @error('desc')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="img" class="form-label mt-4">Foto</label>
                            <input
                                type="file"
                                class="form-control"
                                id="img"
                                placeholder="Materi Name"
                                aria-describedby="defaultFormControlHelp"
                                wire:model="nwimg"
                            />
                            @if($nwimg)
                                <img src="{{$nwimg->temporaryUrl()}}" width=120>
                            @else 
                                <img src="{{asset('assets/materi')}}/{{$img}}" width=120>
                            @endif
                            @error('nwimg')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary mt-4">Edit Materi</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

