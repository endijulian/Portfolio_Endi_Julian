<?php

  function get_CURL($url){

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return  json_decode($result, true);
  }

  $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyDh-1QwIzlySiyo_aPlVVSbQXdYYo-H5mE');
  
  $youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $subscriber = $result['items'][0]['statistics']['subscriberCount'];

  //lates video

  $urlLatesVidio = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDh-1QwIzlySiyo_aPlVVSbQXdYYo-H5mE&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&part=snippet&order=date';

  $result = get_CURL($urlLatesVidio);
  $latesVidioId = $result['items'][0]['id']['videoId'];

  //instagram API
  $clientId = 'e49b8a13cc8d4f2c8361fe661b5fa878';
  $accesToken = '2361470076.e49b8a1.e8e9ffe745c6491bb68a98c2e6d74fcd';

  $result = get_CURL('https://api.instagram.com/v1/users/self?access_token=2361470076.e49b8a1.e8e9ffe745c6491bb68a98c2e6d74fcd');

  $usernameIG = $result['data']['username'];
  $profilePictureIG = $result['data']['profile_picture'];
  $followersIG = $result['data']['counts']['followed_by'];

  //lates IG Post
  $result = get_CURL('https://api.instagram.com/v1/users/self/media/recent?access_token=2361470076.e49b8a1.e8e9ffe745c6491bb68a98c2e6d74fcd&count=8');

  $photos = [];
  foreach($result['data'] as $poto ){
    $photos[] = $poto['images']['thumbnail']['url'];

  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/CSSaya.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Endi Julian</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/cv.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4 text-white">Endi Julian</h1>
          <h3 class="lead text-white">WEB PROGRAMER</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Janganlah menganggap remeh hal-hal yang terdekat dengan hati Anda. Rangkullah mereka seperti sama berharganya dengan hidup Anda, karena tanpa mereka hidup adalah sia-sia.</p>
          </div>
          <div class="col-md-5">
            <p>Pertama kita membentuk kebiasaan dan kebiasaan akan membentuk kita. Kalahkan kebiasaan buruk Anda, atau mereka akan mengalahkan Anda</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube & IG -->
    <section class="social bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social media</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail"> 
              </div>
                
              <div class="col-md-8">
                <h5><?= $channelName; ?></h5>
                <p><?= $subscriber; ?> Subscribers. </p>
                <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-theme="dark" data-count="default"></div>
                
              </div>
            </div>

            <div class="row pt-3 mb-3">
              <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latesVidioId; ?>?rel=0" allowfullscreen></iframe>
              </div>
              </div>
            </div>

          </div>

          <div class="col-md-5">

            <div class="row">
              <div class="col md-4"> 
                <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail"> 
              </div>

              <div class="col-md-8">
                <h5><?= $usernameIG; ?></h5>
                <p><?= $followersIG; ?> Followers.</p>
              </div>
            </div>

            <div class="row mt-3 pb-3">
              <div class="col">
              <?php foreach ($photos as $poto) : ?>
                
                <div class="ig-thumbnail">
                  <img src="<?= $poto ?>">
                </div>

                <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>


    <!-- Portfolio -->
    <section class="portfolio " id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi1.JPG" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Sambutan acara pertama HIMTI FEST 2018 yaitu acara seminar OPEN STACK.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi2.JPG" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Penyerahan plakat acara ke 2 HIMTI FEST 2018 yaitu acara WORKSHOP JARINGAN.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi3.JPG" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Sambutan acara ke 3 HIMTI FEST 2018 yaitu SEMINAR NASIONAL.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi4.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Musyawarah Nasional ke 5 PERMIKOMNAS ( Perhimpunan Mahasiswa Informatika dan Komputer Nasional bertempat di jakarta.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi5.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Rapat Kerja Nasional  ke 5 PERMIKOMNAS ( Perhimpunan Mahasiswa Informatika dan Komputer Nasional bertempat di sumatera utara./p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/endi6.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Poto ini diambil ketika masih menjabat menjadi Wakil Ketua Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang HIMTI-UMT.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Kontak Saya</h5>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Lokasi</h3></li>
              <li class="list-group-item">Kota Tangerang</li>
              <li class="list-group-item">+628577981290</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">No Hanphone</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Pesan</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Kirim</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>

    <div class="row pt-5 mb-5 justify-content-center">
      <div class="judul col-6">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.979740129998!2d106.6228265!3d-6.1982438!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f92d66d06ce3%3A0x1123e77d49c82ca0!2sUniversitas+Muhammadiyah+Tangerang+(UMT)!5e0!3m2!1sid!2sid!4v1533357784793" width="100%" height="300" frameborder="5" style="border:2" allowfullscreen></iframe>
        </div>
      </div>
    </div>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright Endi julian&copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>