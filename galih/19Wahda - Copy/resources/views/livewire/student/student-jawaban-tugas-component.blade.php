@if($tugas->deadline > now())
    @if($tugas->status === 'aktif')
        <div>
            <div class="content-wrapper">
                    <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="card mb-4">
                        <h5 class="card-header">Tambah Jawaban</h5>
                        <form action="" wire:submit.prevent="addJawaban">
                            <div class="card-body">
                                <div>
                                    <label for="name" class="form-label">Jawaban</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Jawaban"
                                        aria-describedby="defaultFormControlHelp"
                                        wire:model="jawaban"
                                    />
                                    @error('jawaban')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="img" class="form-label">File</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="img"
                                        placeholder="Image"
                                        aria-describedby="defaultFormControlHelp"
                                        wire:model="file"
                                    />
                                    @error('file')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="desc" class="form-label">Deskripsi</label>
                                    <textarea name="desc" id="desc" wire:model="description" class="form-control"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-primary mt-4">Kirim Jawaban</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    @else
        <body onload="location.href='{{route('student.tugas')}}'"></body>
    @endif
@else
    <body onload="location.href='{{route('student.tugas')}}'"></body>
@endif


