@if(Auth::check('login'))
    <div>
        <style>
            .ok {
                flex-wrap: wrap;
                width: 75vw;
            }
        </style>
        <div class="content-wrapper">
                <!-- Content -->

            <div class="ok container-xxl flex-grow-1 container-p-y d-flex">
                
                @foreach($materi as $s)
                    <div class="card m-3" style="width: 16rem;">
                        <img class="card-img-top" src="{{asset('assets/materi')}}/{{$s->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$s->name}}</h5>
                            <p class="card-text">{{$s->description}}</p>
                            <a href="{{route('materi.bab',['materi_id'=>$s->id])}}" class="btn btn-primary">Baca Materi</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@else
    <body onload="location.href='{{route('login')}}'"></body>
@endif