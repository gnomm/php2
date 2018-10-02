<? //= var_dump($query) ?>


<h1>не успел сделать</h1>

<h2>Ваш заказ</h2>

<table class="cartTable">
    <tr>
        <th>Товар</th>
        <th class="th">Размер</th>
        <th class="th">Количество</th>
        <th class="th">Цена</th>
        <th class="th">Общая цена</th>
    </tr>
    <?php if (!empty($query)): ?>
        <?php foreach ($query as $item): ?>
            <tr>
                <td><?= $item["name"] ?></td>
                <td class="td"><?= $item["size"] ?></td>
                <td class="td"><?= $item["quantity"] ?></td>
                <td class="td"><?= $item["price"] ?></td>
                <td class="td"><?= $item["score"] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<form action="" method="post">
    <button name="checkoutDelBd" type="submit">Отменить заказ</button>
    <button>Потвердить</button>

</form>


