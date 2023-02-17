<style>
  @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');

  .okk{
    filter: brightness(80%) blur(5px);
  }
  .yaa{
    font-family: 'Shadows Into Light', cursive;
  }
  .ya{
    color: white;
  }
</style>
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="w-100 okk" style="height: 80vh" src="{{asset('assets2/img/guru.jpeg')}}" alt="Image" />
              <div class="carousel-caption">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-6">
                      <h3 class="display-3 text-light yaa mb-4 animated slideInDown">
                        Pendidikan Adalah Kunci Utama Anda
                      </h3>
                      <p class="fs-5 mb-5 ya">
                        Pendidikan adalah pembelajaran sekelompok orang yang diturunkan dari satu generasi ke generasi berikutnya melalui pengajaran, pelatihan, atau penelitian.
                      </p>
                      <a href="" class="btn btn-primary py-3 px-5"
                        >Baca Selengkapnya</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="w-100 okk" style="height: 80vh" src="{{asset('assets2/img/guru1.jpg')}}" alt="Image" />
              <div class="carousel-caption">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-6">
                      <h1 class="display-3 text-light yaa mb-4 animated slideInDown">
                        Siswa Terbaik Dimulai dari Sini
                      </h1>
                      <p class="fs-5 ya mb-5">
                        Pendidikan sering terjadi di bawah bimbingan orang lain, tetapi juga memungkinkan secara otodidak.
                      </p>
                      <a href="" class="btn btn-primary py-3 px-5"
                        >Baca Selengkapnya</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Setelahnya</span>
          </button>
        </div>
      </div>
      <!-- Carousel End -->

      <!-- Features Start -->
      <div class="container-xxl py-5 mt-5">
        <div class="container">
          <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
              <h1 class="display-6 mb-5">Beberapa Alasan Mengapa Orang Memilih Kami!</h1>
              <p class="mb-4">
                Kami memiliki hubungan yang sangat baik dari setiap produsen yang juga memproduksi produk berkualitas. Para produsen tersebut mempercayakan produk mereka kepada kami sebagai mitra usaha. 
              </p>
              <div class="row g-3">
                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                  <div class="bg-light rounded h-100 p-3">
                    <div
                      class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                    >
                      <img
                        class="align-self-center mb-3"
                        src="{{asset('assets2/img/icon/icon-06-primary.png')}}"
                        alt=""
                      />
                      <h5 class="mb-0">Proses Mudah</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                  <div class="bg-light rounded h-100 p-3">
                    <div
                      class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                    >
                      <img
                        class="align-self-center mb-3"
                        src="{{asset('assets2/img/icon/icon-03-primary.png')}}"
                        alt=""
                      />
                      <h5 class="mb-0">Tampilan Bersahabat</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                  <div class="bg-light rounded h-100 p-3">
                    <div
                      class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                    >
                      <img
                        class="align-self-center mb-3"
                        src="{{asset('assets2/img/icon/icon-04-primary.png')}}"
                        alt=""
                      />
                      <h5 class="mb-0">Pengendalian Kebijakan</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                  <div class="bg-light rounded h-100 p-3">
                    <div
                      class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                    >
                      <img
                        class="align-self-center mb-3"
                        src="{{asset('assets2/img/icon/icon-07-primary.png')}}"
                        alt=""
                      />
                      <h5 class="mb-0">Gratis</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
              <div
                class="position-relative rounded overflow-hidden h-100"
                style="min-height: 400px"
              >
                <img
                  class="position-absolute w-100 h-100"
                  src="{{asset('assets2/img/feature.jpg')}}"
                  alt=""
                  style="object-fit: cover"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Features End -->

      <!-- Testimonial Start -->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">Apa Kata Mereka Tentang Situs Web Kami</h1>
          </div>
          <div class="row g-5">
            <div class="col-lg-3 d-none d-lg-block">
              <div class="testimonial-left h-100">
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-1.jpg')}}"
                  alt=""
                />
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-2.jpg')}}"
                  alt=""
                />
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-3.jpg')}}"
                  alt=""
                />
              </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
              <div class="owl-carousel testimonial-carousel">
                @foreach($review as $r)
                <div class="testimonial-item text-center">
                  @if($r->image == 'user.png')
                  <img
                    class="img-fluid rounded mx-auto mb-4"
                    src="{{asset('assets/img')}}/{{$r->image}}"
                    alt=""
                  />
                  @else
                  <img
                    class="img-fluid rounded mx-auto mb-4"
                    src="{{$r->image}}"
                    alt=""
                  />
                  @endif
                  <p class="fs-5">
                   {{$r->message}}
                  </p>
                  <h5>{{$r->name}}</h5>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
              <div class="testimonial-right h-100">
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-1.jpg')}}"
                  alt=""
                />
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-2.jpg')}}"
                  alt=""
                />
                <img
                  class="img-fluid animated pulse infinite"
                  src="{{asset('assets2/img/testimonial-3.jpg')}}"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Testimonial End -->

    