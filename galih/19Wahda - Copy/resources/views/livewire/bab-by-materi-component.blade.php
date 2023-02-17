@if(Auth::check('login'))
<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y d-flex">
            
            @foreach($bab as $s)
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$s->name}}</h5>
                        <p class="card-text">{{$s->description}}</p>
                        <a href="{{route('materi.bab.show',['bab_id'=>$s->id])}}" class="btn btn-primary">Baca Bab</a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
@else
    <body onload="location.href='{{route('login')}}'"></body>
@endif
