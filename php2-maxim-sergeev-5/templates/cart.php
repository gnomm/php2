<?php /** @var \app\models\Product $$getCartProducts */ ?>


<?// var_dump($getCartProducts);?>
<?// var_dump($_SESSION);?>


<?php if (empty($getCartProducts)): ?>
    <h2 class="cartH2">Корзина пуста</h2>
<?php endif; ?>


<?php if (!empty($getCartProducts)): ?>
    <div class="cart">
        <h2 class="cartH2">Корзина</h2>
        <table class="cartTable">
            <tr>
                <th>Товар</th>
                <th class="th">Размер</th>
                <th class="th">Количество</th>
                <th class="th">Цена</th>
                <th class="th">Общая цена</th>
            </tr>
            <?php foreach ($getCartProducts as $item): ?>
                <tr>
                    <td><?= $item[0] ?></td>
                    <td class="td"><?= $item[1] ?></td>
                    <td class="td"><?= $item[2] ?></td>
                    <td class="td"><?= $item[3] ?></td>
                    <td class="td"><?= $item[2] * $item[3] ?></td>
                    <td>
                        <form action="" method="post">
                            <button class="cartDel" name="cartDeleteItem" type="submit"
                                    value="<?= $item[4] ?>"></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <form action="" method="post">
            <div class="cartcheckout">
                <button name="cartCheckout" class="cartButton" type="submit">Оформить заказ</button>
            </div>
        </form>
    </div>
<?php endif; ?>



