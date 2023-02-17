<div>
    <style>
        .yy 
        {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
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
            @if(Session::has('message'))
                <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
            @endif
            <a href="{{route('student.check.tugas')}}" class="btn btn-primary mb-5">Check Tugas Mu</a>
                <div class="yy">
                    @if($tugas->count() > 0)
                            @foreach($tugas as $t)
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
                            {{$tugas->links()}}
                    @else
                        <p>All Done</p>
                    @endif
                </div>
        </div>

    </div>
</div>