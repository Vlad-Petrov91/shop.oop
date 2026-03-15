<h2>Корзина</h2>

<?php foreach ($cart as $item): ?>
    <div id="<?= $item['cartId'] ?>">
        <h3><?= $item['name'] ?></h3>
        <p>price: <?= $item['price'] ?></p>
        <p>count: <?= $item['count'] ?></p>
        <button class="delete" data-id="<?= $item['cartId'] ?>">Удалить</button>
    </div>
<?php endforeach; ?>

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