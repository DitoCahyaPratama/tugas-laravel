<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
    <div class="avatar avatar-online">
        @if(isset($user->student->image))
            <img src="{{asset('assets/student')}}/{{$user->student->image}}" alt class="w-px-40 h-auto rounded-circle" />
        @elseif(isset($user->teacher->image))
            <img src="{{asset('assets/teacher')}}/{{$user->teacher->image}}" alt class="w-px-40 h-auto rounded-circle" />
        @else
            <img src="{{asset('assets/img/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
        @endif
    </div>
</a>
<ul class="dropdown-menu dropdown-menu-end">
    <li>
    <a class="dropdown-item" href="#">
        <div class="d-flex">
        <div class="flex-shrink-0 me-3">
            <div class="avatar avatar-online">
                @if(isset($user->student->image))
                    <img src="{{asset('assets/student')}}/{{$user->student->image}}" alt class="w-px-40 h-auto rounded-circle" />
                @elseif(isset($user->teacher->image))
                    <img src="{{asset('assets/teacher')}}/{{$user->teacher->image}}" alt class="w-px-40 h-auto rounded-circle" />
                @else
                    <img src="{{asset('assets/img/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                @endif
            </div>
        </div>
        