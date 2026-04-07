<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/style/style.min.css">
    <!-- <link rel="stylesheet" href="/style/cart-style.min.css"> -->
    <title>Index</title>
</head>

<body>
    <header>
        <?= $menu ?>
    </header>
    <?= $content ?>
    <footer>
        <div class="footer__menu container">
            <div class="footer__menu__element"><img src="/img/delivery.svg" alt="devivery">
                <h3>Free Delivery</h3>
                <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
                </p>
            </div>
            <div class="footer__menu__element footer__menu__element_margin"><img src="/img/sales.svg" alt="percent">
                <h3>Sales & discounts</h3>
                <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
                </p>
            </div>
            <div class="footer__menu__element"><img src="/img/quality.svg" alt="quality">
                <h3>Quality assurance</h3>
                <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.
                </p>
            </div>
        </div>
        <div class="footer__subscribe_panel_bg">
            <div class="footer__subscribe_panel container">
                <div class="footer__subscribe_panel_info">
                    <img src="/img/face.png" alt="photo">
                    <p>“Vestibulum quis porttitor dui! Quisque viverra nunc mi, <i>a pulvinar purus
                            condimentum</i> “
                    </p>
                </div>
                <div class="footer__subscribe_panel_form">
                    <div class="footer__subscribe_panel_form_heating">
                        <h3>SUBSCRIBE</h3>

                        <p>FOR OUR NEWLETTER AND PROMOTION
                        </p>
                    </div>
                    <form class="form_subscribe" action="#">
                        <input class="input" id="mail" type="text"
                            pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                            placeholder="Your email">
                        <button class="subscribe_button" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer__bottom">

            <div class="footer__bottom_copyright">
                <p>© 2021 Brand All Rights Reserved.</p>
            </div>
            <div class="footer__bottom_social_networks">
                <div class="social_networks_logo"><a href="https://www.facebook.com/"><img src="/img/facebook.svg"
                            alt="facebook"></a></div>
                <div class="social_networks_logo"><a href="https://www.instagram.com/"><img src="/img/insta.svg"
                            alt="instagram"></a></div>
                <div class="social_networks_logo"><a href="https://www.pinterest.ru/"><img src="/img/pinterest.svg"
                            alt="pinterest"></a></div>
                <div class="social_networks_logo"><a href="https://twitter.com/"><img src="/img/twitter.svg"
                            alt="twitter"></a></div>
            </div>
        </div>


    </footer>
</body>

</html>