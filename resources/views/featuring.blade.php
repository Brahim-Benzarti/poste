<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our - Partners</title>
    <link rel="stylesheet" href="css/featuring_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center font-weight-bold">Featuring</h2>
        <section class="customer-logos slider">
            <div class="slide"><img src="images/featuring/ccpnet.png" alt="logo"></div>
            <!-- <div class="slide"><img src="images/featuring/e_eshop.gif" alt="logo"></div> -->
            <div class="slide"><img src="images/featuring/logo_mobimoney.png" alt="logo"></div>
            <div class="slide"><img src="images/featuring/westernunion.png" alt="logo"></div>
            <div class="slide"><img src="images/featuring/mobidinar.jpg" alt="logo"></div>
            <div class="slide"><img src="images/featuring/mobiflouss.jpg" alt="logo"></div>
            <div class="slide"><img src="images/featuring/rapidpost.png" alt="logo"></div>
            <div class="slide"><img src="images/featuring/tikashop-logo.png" alt="logo"></div>
        </section>
    </div>
    <script>
    
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover:false,
            responsive: [{
                breakpoint: 768,
                setting: {
                    slidesToShow:4
                }
            }, {
                breakpoint: 520,
                setting: {
                    slidesToShow: 3
                }
            }]
        });
    });

    </script>

</body>
</html>