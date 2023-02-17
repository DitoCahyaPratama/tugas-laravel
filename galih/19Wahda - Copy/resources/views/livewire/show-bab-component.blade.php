@if(Auth::check('login'))
<div>
    <div class="content-wrapper">
            <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
       
            @if($bab->file)
                <iframe src="{{asset('assets/bab')}}/{{$bab->file}}" id="detail_tugas" frameborder="0" style="width: 100%;min-height:400px;" allowfullscreen></iframe>
            @endif
        </div>

    </div>
</div>
@else
    <body onload="location.href='{{route('login')}}'"></body>
@endif
