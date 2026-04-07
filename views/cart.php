    <div class="catalog__top">
        <div class="catalog__heating__content container">
            <h2>SHOPPING CART</h2>

        </div>
    </div>

    <div class="cart_content container">

        <div class="cart_item">


            <?php foreach ($cart as $item): ?>
                <div id="<?= $item['cartId'] ?>" class=" cart_items item_<?= $item['cartId'] ?>"><img src=/img/catalog/<?= $item['image'] ?> alt="<?= $item['image'] ?>">
                    <article>
                        <div class="cart_items_header">
                            <h3><?= $item['name'] ?></h3>
                            <button class="delete" data-id="<?= $item['cartId'] ?>" id="closeButton"><img src="/img/close.svg" alt="closeButton"></button>
                        </div>
                        <ul>
                            <li>Price: <span>$<?= $item['price'] ?></span></li>

                            <li>Quantity: <input class="quantity" type="number" size="3" name="num" min="1" max="10"
                                    value=<?= $item['count'] ?>></li>
                        </ul>
                    </article>
                </div>
            <?php endforeach; ?>


            <div class="cart_buttons">
                <button id="clear">CLEAR SHOPPING CART</button>
                <button id="continue">CONTINUE SHOPPING</button>
            </div>
        </div>

        <div class="cart_form">
            <form action="#">
                <h3>SHIPPING ADRESS</h3>
                <input class="input" id="country" type="text" placeholder="Bangladesh">
                <input class="input" id="state" type="text" placeholder="State">
                <input class="input" id="zip" type="text" placeholder="Postcode / Zip">
                <button>GET A QUOTE</button>
            </form>

            <div class="checkout">
                <p>SUB TOTAL &emsp;&ensp; $900</p>
                <p>GRAND TOTAL &emsp;&ensp; <span>$900</span></p>
                <hr>
                <button>PROCEED TO CHECKOUT</button>

            </div>
        </div>

    </div>

    <script>
        let buttons = document.querySelectorAll('.delete');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let cartId = elem.getAttribute('data-id');
                let count = elem.getAttribute('data-count');
                let price = elem.getAttribute('data-price');
                console.log(cartId);


                window.onload = (
                    async () => {
                        try {
                            const url = '/cart/delete/';
                            const data = {
                                cartId: cartId,
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

                            const element = document.getElementById(cartId);
                            element.remove(); // Элемент удаляется из DOM [1, 5]

                            console.log('Успех:', result);
                        } catch (error) {
                            console.log('Ошибка запроса', error);
                        }
                    }
                )();
            })
        })
    </script>