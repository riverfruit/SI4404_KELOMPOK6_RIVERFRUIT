@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

@section('content')
    <div class="" style="width: 100% ; height: 400px ; overflow: hidden">
        <img src="{{asset('/img/fruit.jpg')}}" class="img-fluid overflow-hidden" alt="">
    </div>
  


    <div class="d-flex justify-content-center align-content-center m-3">
        <div class="col-5 p-2 mr-5">
            <h1 class="text-warning">River Fruit</h1>
            <p class="fs-4"> Merupakan sebuah terobosan untuk para masyarakat yang hobinya berkebun untuk mendapatkan menghasilkan
            sebuah pendapatan</p>
        </div>
        <div class="">
            <img src="{{asset('/img/pin.jpg')}}" style="max-width: 200px" class="img-thumbnail overflow-hidden d-block" alt="">
        </div>
    </div>

    <section id="Service">
      <h1 style="text-align: center; margin-top: 20px; text-warning">Lokasi Kami</h1>
      <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.229817161331!2d107.6316854!3d-6.973007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x437398556f9fa03!2sUniversitas%20Telkom!5e0!3m2!1sid!2sid!4v1665919198372!5m2!1sid!2sid" width="700" height="400" style="margin-left: 25% ;margin-top: 7px;" frameborder="0"></iframe>
      </div>
      
      <!--Google Maps-->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

      <!--Card Product-->
      <section id="buah">
        <div class="container">
          <div class="row text-center m-5">
            <div class="col">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-5">
              <div class="card">
                <img src="{{asset('/img/a2.jpg')}}" class="card-img-top" alt="">
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card">
                <img src="{{asset('/img/a1.jpg')}}" class="card-img-top" alt="">
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card">
                <img src="{{asset('/img/a3.jpg')}}" class="card-img-top" alt="">
              </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                  <img src="{{asset('/img/a4.jpg')}}" class="card-img-top" alt="">
                </div>
              </div>
              <div class="col-md-4 mb-5">
                <div class="card">
                  <img src="{{asset('/img/a5.jpg')}}" class="card-img-top" alt="">
                </div>
              </div>
            <div class="col-md-4 mb-5">
              <div class="card">
                <img src="{{asset('/img/a6.jpg')}}" class="card-img-top" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('/img/a7.jpg')}}" class="d-block w-100 " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Kiwi</h5>
                  <p>Merupakan sebuah buah yang luarnya berwana cokelat dan dalamnya berwarna hijau.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('/img/a8.jpg')}}" class="d-block w-100 " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Alpukat</h5>
                  <p>Merupakan sebuah buah yang memiliki rasa unik dan memiliki banyak penggeamr.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('/img/a9.jpg')}}" class="d-block w-100 " alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Starberry</h5>
                  <p>Merupakan buah berwana merah yang sangat iconic.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>




<div class="container mt-100 mt-60">
    <div class="row text-center m-5">
        <div class="col-12 text-center">
            <div class="section-title">
                <h4 class="title mb-4">Our Team Developer</h4>
                <p class="text-muted para-desc mx-auto mb-0">Para pejuang WAD Kelas SI4404 KELOMPOK 06 PROJECT WEB RIVER FRUIT</p>
                <p class="text-muted para-desc mx-auto mb-0">Berfokus dalam membantu masyarakat dalam SDG Zero Hunger.</p>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
            <div class="mt-4 pt-2">
                <div class="team position-relative d-block text-center">
                    <div class="image position-relative d-block overflow-hidden">
                        <img src="{{asset('/img/FAUZZIYAH.PNG')}}" class="img-fluid rounded" alt="">
                        <div class="overlay rounded bg-dark"></div>
                    </div>
                    <div class="content py-2 member-position bg-white border-bottom overflow-hidden rounded d-inline-block">
                        <h4 class="title mb-0">Fauzziyah Azzahra</h4>
                        <small class="text-muted">Front-end Developer / 1202204202</small>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
            <div class="mt-4 pt-2">
                <div class="team position-relative d-block text-center">
                    <div class="image position-relative d-block overflow-hidden">
                        <img src="{{asset('/img/LOUIS.PNG')}}" class="img-fluid rounded" alt="">
                        <div class="overlay rounded bg-dark"></div>
                    </div>
                    <div class="content py-2 member-position bg-white border-bottom overflow-hidden rounded d-inline-block">
                        <h4 class="title mb-0">Louis Yasmin</h4>
                        <small class="text-muted">Front-end Developer / 1202204186 </small>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
            <div class="mt-4 pt-2">
                <div class="team position-relative d-block text-center">
                    <div class="image position-relative d-block overflow-hidden">
                        <img src="{{asset('/img/INSAN.PNG')}}" class="img-fluid rounded" alt="">
                        <div class="overlay rounded bg-dark"></div>
                    </div>
                    <div class="content py-2 member-position bg-white border-bottom overflow-hidden rounded d-inline-block">
                        <h4 class="title mb-0">Insan Bumi Prasasat</h4>
                        <small class="text-muted">Back-end Developer / 1202204309 </small>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
            <div class="mt-4 pt-2">
                <div class="team position-relative d-block text-center">
                    <div class="image position-relative d-block overflow-hidden">
                        <img src="{{asset('/img/KAMAL.PNG')}}" class="img-fluid rounded" alt="">
                        <div class="overlay rounded bg-dark"></div>
                    </div>
                    <div class="content py-2 member-position bg-white border-bottom overflow-hidden rounded d-inline-block">
                        <h4 class="title mb-0">Kamal Fadhillah</h4>
                        <small class="text-muted">Back-end Developer / 1202200034</small>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div>

        <p></p>



  <footer class="text-center text-white" style="background-color: #ffcc00">
    <!-- Grid container -->
    <div class="container">
      <!-- Section: Links -->
      <section class="mt-5">
        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5">
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-2">
            <h2 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white">About Us</a>
            </h2>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-5" />

      <!-- Section: Text -->
      <section class="mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p>
            River fruit memiliki sebuah filosofi river yang berarti sungai dan fruit yang berarti buah yaitu sungai buah yang diharapkan dapat memperdayakan UMKM atau para pekebunan rumahan lebih makmur, dapat menjual buahnya tanpa hitungan minimal lalu calo dan tidak bergantung pada buah import yang setiap tahun harganya selalu naik. Sesuai dengan tujuan negara yaitu meningkatkan kesejahteraan dan menekan kemiskinan.
            Dari hal tersebutlah kami mahasiswa/i Sistem Informasi yang terdiri dari anak muda kreatif yaitu Louis Yasmin, Fauzziyah Azzahra, Insan Bumi Prasasat, Kamal Fadhilah memiliki tujuan untuk memberikan perubahan menuju yang lebih baik untuk masyarakat Indonesia.
            </p>
          </div>
        </div>
      </section>
      <!-- Section: Text -->

      <!-- Section: Social -->
      <section class="text-center mb-5">
      <script src="https://kit.fontawesome.com/a1d276b9ca.js" crossorigin="anonymous"></script>

        <a href="https://www.facebook.com/profile.php?id=100089086819063" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="http://127.0.0.1:8000/" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="https://www.instagram.com/kamal.fadhilah/" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="https://github.com/riverfruit" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </section>
      <!-- Section: Social -->
      
    </div>
    <!-- Grid container -->

  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->




@endsection
