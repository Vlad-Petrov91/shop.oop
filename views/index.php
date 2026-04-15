    <div class="content container">
        <div class="content__category">
            <div class="content__category__card">
                <a href="/product/category/?id=2" class="content__category__link" aria-label="Category: Women">
                    <img src="/img/women.jpg" alt="women">
                    <p class="content__category_text">
                        30% OFF<br>
                        <span class="content__category_text_excretion">FOR WOMEN</span>
                    </p>
                </a>
            </div>
            <div class="content__category__card">
                <a href="/product/category/?id=1" class="content__category__link" aria-label="Category: Men">
                    <img src="/img/men.jpg" alt="men">
                    <p class="content__category_text">
                        HOT DEAL<br>
                        <span class="content__category_text_excretion">FOR MEN</span>
                    </p>
                </a>
            </div>
            <div class="content__category__card">
                <a href="/product/category/?id=3" class="content__category__link">
                    <img src="/img/kids.jpg" alt="kids">
                    <p class="content__category_text">
                        NEW ARRIVALS<br>
                        <span class="content__category_text_excretion">FOR KIDS</span>
                    </p>
                </a>
            </div>
            <div class="content__category__card content__category__card_big">
                <a href="/product/category/?id=4" class="content__category__link" aria-label="Category: Accesories">
                    <img src="/img/accesories.jpg" alt="accesories">
                    <p class="content__category_text">
                        LUXIROUS & TRENDY<br>
                        <span class="content__category_text_excretion">ACCESORIES</span>
                    </p>
                </a>
            </div>
        </div>
        <section class="content__products" aria-labelledby="products-heading">
            <h2 id="products-heading" class="content__products_heating">Featured Items</h2>
            <p class="content__products_text">Shop for items based on what we featured in this
                week
            </p>
            <div class="content__product_cards" role="list">
                <?php foreach ($catalog as $item): ?>
                    <article class="product_card item<?= $item['id'] ?>">
                        <div class="product_card_image">
                            <img src="/img/catalog/<?= $item['image'] ?>" alt="<?= $item['image'] ?>">
                            <div class="product_card_overlay">
                                <button class="add_to_cart_btn" data-id="<?= $item['id'] ?>" data-count="1" data-price="<?= $item['price'] ?>"><img src="/img/add_to_cart.png" alt="Add to Cart">Add to cart</button>
                            </div>
                        </div>
                        <div class="product_card_information">
                            <h3 class="product_card_title"><?= $item['name'] ?></h3>
                            <p class="product_card_description"><?= mb_substr($item['description'], 0, 99) ?></p>
                            <span class="price">$<?= $item['price'] ?></span>
                        </div>
                    </article>

                <?php endforeach; ?>
            </div>

            <a class="products__list_button"
                href="/product/catalog/"
                aria-label="Browse all products">
                Browse All Products
            </a>
        </section>
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