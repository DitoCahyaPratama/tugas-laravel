<div class="container mt-5">
    <div class="col-xl-12">
        <h6 class="text-muted">Tugas</h6>
        <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <li class="nav-item">
            <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-justified-home"
                aria-controls="navs-pills-justified-home"
                aria-selected="true"
            >
                <i class="tf-icons bx bx-home"></i> Berlangsung
                <span class="badge rounded-pill badge-center h-px-20 w-px-20">[ {{$berlangsung->count()}} ]</span>
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-justified-profile"
                aria-controls="navs-pills-justified-profile"
                aria-selected="false"
            >
                <i class="tf-icons bx bx-user"></i> Selesai
                <span class="badge rounded-pill badge-center h-px-20 w-px-20">[ {{$jawaban->count()}} ]</span>
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-justified-messages"
                aria-controls="navs-pills-justified-messages"
                aria-selected="false"
            >
                <i class="tf-icons bx bx-message-square"></i> Terlambat
                <span class="badge rounded-pill badge-center h-px-20 w-px-20">[ {{$terlambat->count()}} ]</span>
            </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                @if($berlangsung->count() > 0)
                        @foreach($berlangsung as $t)
                            <div class="col-md-6 col-lg-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title">{{$t->name}}</h5>
                                        <h6 class="card-subtitle text-muted">{{$t->status}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{$t->description}}</p>
                                        <p class="card-link">Tenggat Waktu : {{$t->deadline}}</p> <br>
                                        <a href="{{route('student.show.tugas',['tugas_id'=>$t->id])}}" >Detail Lanjut</a>
                                        <a href="{{route('student.tugas.jawaban',['tugas_id'=>$t->id])}}" class="ms-5">Kerjakan Tugas</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <p>Tidak Ada Tugas Terkini</p>
                @endif
            </div>
            <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                @if($jawaban->count() > 0)
                        @foreach($jawaban as $t)
                            <div class="col-md-6 col-lg-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title">{{$t->tugas->name}}</h5>
                                        <h6 class="card-subtitle text-muted">{{$t->status}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{$t->tugas->description}}</p>
                                        <p class="card-link">Tenggat Waktu : {{$t->tugas->deadline}}</p> <br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <p>Beum Ada Tugas Yang Selesai Dikerjakan</p>
                @endif
            </div>
            <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                @if($terlambat->count() > 0)
                        @foreach($terlambat as $t)
                            <div class="col-md-6 col-lg-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title">{{$t->name}}</h5>
                                        <h6 class="card-subtitle text-muted">{{$t->status}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{$t->description}}</p>
                                        <p class="card-link">Tenggat Waktu : {{$t->deadline}}</p> <br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <p>Selesai Semua</p>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>