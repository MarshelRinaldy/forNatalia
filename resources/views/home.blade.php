@extends('dashboard')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%; height: 86vh;">
            <div class="carousel-indicators">
                <button type="button" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-target="#carouselExampleIndicators" data-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-target="#carouselExampleIndicators" data-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner" style="width: 100%; height: 86vh;">
                <div class="carousel-item active">
                    <img class="d-block w-100 "
                        src="https://wallpapers.com/images/hd/bakery-aesthetic-goods-76cevcp88bluqarr.jpg" alt="Firstslide">

                </div>

                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="https://wallpapers.com/images/hd/aesthetic-pink-bakery-stand-f2pj7oycqjf4lbbr.jpg"
                        alt="Secondslide">

                </div>

                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="https://wallpapers.com/images/hd/flat-lay-shot-bakery-qhygv762lvdf6jw0.jpg" alt="Thirdslide">

                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </body>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

</html>
