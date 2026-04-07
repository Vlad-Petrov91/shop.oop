        <div class="header__top">
            <div class="header__top__menu container">
                <ul class="header__menu_search">
                    <li><a href="/"><img src="/img/logo.png" alt="logo"></a></li>
                    <li class="menu_el_padding"><img src="/img/search.svg" alt="search"></li>
                </ul>

                <ul class="header__menu_elements">
                    <li><img id="menuButton" class="menu_logo" src="/img/menu.svg" alt="menu"></li>
                    <li class="menu_el_padding"><a href="/products/catalog"><img class="acc_logo" src="/img/account.svg" alt="account"></a></li>
                    <li><a href="/cart"><img class="cart_logo" src="/img/cart.svg" alt="cart"><span class="header__menu_elements_cart" id="countOfInCart"><?= $countOfInCart ?></span></a></li>
                    <div id="menuPanel" class="header__menu_popup">
                        <div class="header__menu_popup_button">
                            <button id="closeMenuButton" class="btn-reset "><img src="/img/close.svg" alt="close"></button>
                        </div>
                        <ul class="header__menu_popup_list">
                            <li><a href="/product/category/?id=1">MEN</a></li>
                            <li><a href="/product/category/?id=2">WOMEN</a></li>
                            <li><a href="/product/category/?id=3">KIDS</a></li>
                            <li><a href="/product/category/?id=4">ACCESSUARES</a></li>
                        </ul>
                    </div>
                </ul>

            </div>

        </div>
        <?php if ($page === '/') : ?>
            <div class="header__bot">

                <div class="header__bot__content container">
                    <div class="header__bot_img"></div>
                    <div class="bot__content__heading">
                        <div class="marker"></div>
                        <h1><span class="header__bolt"> THE BRAND</span><br>
                            OF LUXERIOUS <span class="header__excretion">FASHION</span></h1>
                    </div>

                </div>
                <!--<div class="header__bot_dark">
                <div class="header__bot_context_menu"></div> Всплывающее меню (не успел)
            </div> -->
            </div>
        <?php endif ?>

        <script>
            const menuButton = document.getElementById('menuButton');
            const menuPanel = document.getElementById('menuPanel');

            menuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                menuPanel.classList.toggle('active');
            });
            closeMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                menuPanel.classList.remove('active');
            });

            // Закрытие меню при клике вне его
            document.addEventListener('click', function(e) {
                if (!menuPanel.contains(e.target) && e.target !== menuButton) {
                    menuPanel.classList.remove('active');
                }
            });
        </script>