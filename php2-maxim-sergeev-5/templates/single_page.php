<?php /** @var \app\models\Product $product */ ?>


<?//=var_dump($product)?>
<section class="page_slider1">
    <a href="#" class="fa fa-angle-left"></a>
    <img src="<?= $product->foto ?>" alt="img1">
    <a href="#" class="fa fa-angle-right"></a>
</section>
<section class="page_slider2">
    <div class="page_slider2_text">
        <h3><?= $product->category_id?></h3>
        <div class="page_slider2_text_h3_border"></div>
        <h2><?= $product->name ?></h2>
        <p><?= $product->description ?></p>
        <div class="page_slider2_material">
            <h4>MATERIAL:
                <span class="page_slider2_bold"><?= $product->material ?></span>
            </h4>
            <h4>DESIGNER:
                <span class="page_slider2_bold"><?= $product->produced_by ?></span>
            </h4>
        </div>
        <div class="clearfix"></div>
        <div class="page_slider2_price"><?= $product->price ?> р.</div>
        <div class="page_slider2_text_price_border"></div>
    </div>
    <form action="#" class="page_slider2_order" method="post">
<!--        <label for="color">CHOOSE COLOR</label>-->
        <label for="size">CHOOSE SIZE</label>
        <label for="quantity">QUANTITY</label>
<!--        <select id="color" name="color">-->
<!--            <option value="red">red</option>-->
<!--            <option value="green">green</option>-->
<!--            <option value="black">black</option>-->
<!--            <option value="blue">blue</option>-->
<!--            <option value="yellow">yellow</option>-->
<!--        </select>-->
        <select id="size" name="size">
            <option value="xss">xxs</option>
            <option value="xs">xs</option>
            <option value="s">s</option>
            <option value="m">m</option>
            <option value="l">l</option>
            <option value="xl">xl</option>
            <option value="xxl">xxl</option>
        </select>
        <input type="number" id="quantity" name="quantity" value="1">
        <button type="submit" name="AddToCart">Add to Cart</button>
        <!--            <a href="#" name="AddToCart">-->
        <!--                <img src="img/single_page_img2.png" alt="">Add to Cart </a>-->
    </form>
</section>
<section class="page_slider3">
    <h2>you may like also</h2>
    <div class="page_slider3_product">
<?php foreach ($productYouLike as $value):?>
        <article class="products">
            <a href="/single_page?id=<?= $value["id"]?>">
                <img src="<?= $value["foto"]?>" alt="<?= $value["name"]?>" width="261" height="280">
                <h3><?= $value["name"]?></h3>
                <p><?= $value["price"]?></p>
            </a>
        </article>
        <?php endforeach;?>
    </div>
    <!-- <div class="page_slider3_product">
        <article class="products">
            <a href="#">
                <img src="img/products/product_10.jpg" alt="product_10">
                <h3>blaze leggings</h3>
                <p>$52.00</p>
            </a>
        </article>
        <article class="products">
            <a href="#">
                <img src="img/products/product_14.jpg" alt="product_11">
                <h3>alexa sweater</h3>
                <p>$52.00</p>
            </a>
        </article>
        <article class="products">
            <a href="#">
                <img src="img/products/product_12.jpg" alt="product_12">
                <h3>agnes top</h3>
                <p>$52.00</p>
            </a>
        </article>
        <article class="products">
            <a href="#">
                <img src="img/products/product_13.jpg" alt="product_13">
                <h3>sylva sweater </h3>
                <p>$52.00</p>
            </a>
        </article>
    </div> -->
</section>