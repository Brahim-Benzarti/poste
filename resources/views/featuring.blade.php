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
        <section class="row customer-logos slider">
            <div class="slide"><a href="http://www.ccpnet.poste.tn/fr/" target="_blank"><img src="images/featuring/ccpnet.png" alt="logo"></a></div>
            <!-- <div class="slide"><a href="" target="_blank"></a><img src="images/featuring/e_eshop.gif" alt="logo"></div> -->
            <div class="slide"><a href="https://e-dinar.poste.tn/fr/guide4.html" target="_blank"><img src="images/featuring/logo_mobimoney.png" alt="logo"></a></div>
            <div class="slide"><a href="https://e-dinar.poste.tn/fr/" target="_blank"><img src="images/featuring/westernunion.png" alt="logo"></a></div>
            <div class="slide"><a href="https://e-dinar.poste.tn/fr/guide.html" target="_blank"><img src="images/featuring/mobidinar.jpg" alt="logo"></a></div>
            <div class="slide"><a href="https://e-dinar.poste.tn/fr/guide3.html" target="_blank"><img src="images/featuring/mobiflouss.jpg" alt="logo"></a></div>
            <div class="slide"><a href="https://www.rapidposte.poste.tn/fr/index.html" target="_blank"><img src="images/featuring/rapidpost.png" alt="logo"></a></div>
            <div class="slide"><a href="https://tikashop.poste.tn/" target="_blank"><img src="images/featuring/tikashop-logo.png" alt="logo"></a></div>
            <div class="slide"><a href="http://www.mailpost.tn/portail/fr/index.html" target="_blank"><img src="images/featuring/mailpost.png" alt="logo"></a></div>
        </section>
    </div>
    <script>
    
    $(document).ready(function(){
        var num=6;
        $('.customer-logos').slick({
            slidesToShow:6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover:true,
            responsive: [
                {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
                }
            ]
        });
    });

    </script>

</body>
</html>