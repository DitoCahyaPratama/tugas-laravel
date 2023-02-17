@if($user->utype === 'TEA')
    <div>
        <div class="content-wrapper">
                <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="card mb-4">
                    <h5 class="card-header">Atur Ulang Password</h5>
                    <form action="" wire:submit.prevent="reset1">
                        @if(Session::has('message'))
                            <div class="alert alert-danger mt-3" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <div class="card-body">
                            <div>
                                <label for="password" class="form-label">Password Baru</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="New Password"
                                    aria-describedby="defaultFormControlHelp"
                                    wire:model="password"
                                />
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="form-label mt-3">Password Konfirmasi</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="Password Confirmation"
                                    placeholder="Password Confirmation"
                                    aria-describedby="defaultFormControlHelp"
                                    wire:model="password_confirmation"
                                />
                                @error('password_confirmation')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary mt-4">Atur Ulang Password</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@else 
    <body onload="location.href='{{route('admin.student')}}'"></body>
@endif



