    <div class="content ">
        <div class="catalog__top">
            <div class="catalog__heating__content container">
                <h2>CATALOG</h2>
                <div class="page__way"><a href="/">HOME</a> / <a href="/product/catalog">CATALOG</a> <? if (isset($categoryName)): ?>/<a href="/product/catalog"><?= strtoupper($categoryName) ?></a><? endif; ?></div>
            </div>
        </div>
        <!-- <div class="filter container">
            <div class="filter__open"> <span>FILTER</span> <img src="/img/filter.svg" alt="logo"></div>
            <div class="filter__menu">
                <div class="trending">TRENDING NOV <img src="img/filter_vector.svg" alt=""></div>
                <div class="size">SIZE <img src="/img/filter_vector.svg" alt=""></div>
                <div class="prise">PRISE <img src="/img/filter_vector.svg" alt=""></div>
            </div> -->

    </div>
    <div class="catalog__product__cards container">
        <?php foreach ($catalog as $item): ?>

            <article class="product_card item<?= $item['id'] ?>">
                <div class="product_card_image">
                    <img src="/img/catalog/<?= $item['image'] ?>" alt="<?= $item['image'] ?>">
                    <div class="product_card_overlay">
                        <button class="add_to_cart_btn" data-id="<?= $item['id'] ?>" data-count="1" data-price="<?= $item['price'] ?>"><img src="/img/cart.svg" alt="Add to Cart">Add to cart</button>
                    </div>
                </div>
                <div class="product_card_information">
                    <h3 class="product_card_title"><?= $item['name'] ?></h3>
                    <p class="product_card_description"><?= mb_substr($item['description'], 0, 99) ?></p>
                    <span class="price">$<?= $item['price'] ?></span>
                </div>
            </article>

        <?php endforeach; ?>

    </div>`
    <div class="catalog__list">
        <a href="<?= $pageUrl . ($page - 1) ?>"><img src="/img/page_left.svg" alt="Arrow pointing left to navigate to the previous page in the product catalog"></a>

        <?php for ($i = 1; $i <= $countPages; $i++): ?>
            <a class="catalog__list_article<? if ($i == $page): ?> page_active <? endif; ?>" href="<?= $pageUrl . $i ?>"><?= $i ?></a>
        <?php endfor; ?>

        <a href="<?= $pageUrl . ($page + 1) ?>"><img src="/img/page_right.svg" alt="Arrow pointing right to navigate to the next page in the product catalog"></a>
    </div>
    </div>




    <script>
        let buttons = document.querySelectorAll('.add_to_cart_btn');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                let count = elem.getAttribute('data-count');
                let price = elem.getAttribute('data-price');

                window.onload = (
                    async () => {
                        try {
                            const url = '/cart/add/';
                            const data = {
                                id: id,
                                count: count,
                                price: price
                            };

                            const response = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(data)
                            });

                            if (!response.ok) {
                                throw new Error(`Ошибка: ${response.status}`);
                            }
                            const result = await response.json();
                            document.getElementById('countOfInCart').textContent = result.countOfInCart;
                            console.log('Успех:', result);
                        } catch (error) {
                            console.log('Ошибка запроса', error);
                        }
                    }
                )();
            })
        })
    </script>