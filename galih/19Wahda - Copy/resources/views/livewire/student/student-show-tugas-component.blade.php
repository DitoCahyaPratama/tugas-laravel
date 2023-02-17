<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <p>Soal : {{$tugas->soal}}</p>
            <!-- <object data="{{asset('assets/tugas')}}/{{$tugas->file}}" type="" width="100%" height="485vh"></object> -->
            @if($tugas->file)
                <iframe src="{{asset('assets/tugas')}}/{{$tugas->file}}" id="detail_tugas" frameborder="0" style="width: 100%;min-height:400px;" allowfullscreen></iframe>
            @endif
        </div>

    </div>
</div>
