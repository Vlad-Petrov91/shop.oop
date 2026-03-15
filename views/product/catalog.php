<h2>Каталог</h2>

<?php foreach ($catalog as $item): ?>
    <div>
        <h3><a href="/?c=product&a=card&id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <p>price: <?= $item['price'] ?></p>
        <button class="buy" data-id="<?= $item['id'] ?>" data-count="1" data-price="<?= $item['price'] ?>">Купить</button>
    </div>
<?php endforeach; ?>

<a href="/product/catalog/?page=<?= $page ?>">Еще</a>

<script>
    let buttons = document.querySelectorAll('.buy');
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