<div class="container mt-5">
    <div class="col-lg-12 mb-5 order-0">
        <div class="card" style="height: 80vh">
            <div class="d-flex align-items-end row">
                <div class="col-sm-6">
                    <div class="card-body">
                        <form action="" wire:submit.prevent="review">
                            <h2 class="card-header text-center mt-3 text-primary"><span class="fw-bold">Review Kami</span></h2>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                @if(Session::has('message'))
                                    <div class="alert alert-success mt-3" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <div class="input-group">
                                <span class="input-group-text mt-3" id="basic-addon11">@</span>
                                <input
                                    type="text"
                                    class="form-control mt-3"
                                    placeholder="Nama"
                                    aria-label="Username"
                                    aria-describedby="basic-addon11"
                                    wire:model="name"
                                />
                                </div>

                                <div class="input-group">
                                <span class="input-group-text mt-3 mb-3">Dengan Komentar</span>
                                <textarea class="form-control mt-3 mb-3" aria-label="With textarea" placeholder="Komentar" wire:model="message"></textarea>
                                </div>

                                <button class="btn btn-primary" type="submit">Review !</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img
                        src="../assets/img/illustrations/caraosel.png"
                        height="250"
                        alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
