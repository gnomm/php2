<?php /** @var \app\models\Product $product */ ?>


<nav>
    <div class="product_menu">
        <details class="">
            <summary class="product_menu_border"><span>Category</span></summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">Polos</a></li>
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">Sweaters & Knits</a></li>
                <li><a href="#">T-Shirts</a></li>
                <li><a href="#">Tanks</a></li>
            </ul>
        </details>
        <details>
            <summary class="product_menu_border"><span>BRAND</span></summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">Polos</a></li>
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">Sweaters & Knits</a></li>
                <li><a href="#">T-Shirts</a></li>
                <li><a href="#">Tanks</a></li>
            </ul>
        </details>
        <details>
            <summary class="product_menu_border"><span>dESIGNER</span></summary>
            <ul>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Bags</a></li>
                <li><a href="#">Denim</a></li>
                <li><a href="#">Hoodies & Sweatshirts</a></li>
                <li><a href="#">Jackets & Coats</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">Polos</a></li>
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">Sweaters & Knits</a></li>
                <li><a href="#">T-Shirts</a></li>
                <li><a href="#">Tanks</a></li>
            </ul>
        </details>
    </div>
</nav>
<div class="product_block_center">
    <section class="product_options">
        <div class="product_trending">
            <h2>Trending now</h2>
            <ul>
                <li><a href="#">Bohemian</a></li>
                <li><a href="#">Floral</a></li>
                <li><a href="#">Lace Floral</a></li>
                <li><a href="#">Lace</a></li>
                <li><a href="#">Bohemian</a></li>
            </ul>
        </div>
        <div class="product_size">
            <h2>Size</h2>
            <form action="#" class="product_size_form">
                <div><input type="checkbox" id="xxs">
                    <label for="xxs">xxs</label></div>
                <div><input type="checkbox" id="xs">
                    <label for="xs">xs</label></div>
                <div><input type="checkbox" id="s">
                    <label for="s">s</label></div>
                <div><input type="checkbox" id="m">
                    <label for="m">m</label></div>
                <div><input type="checkbox" id="l">
                    <label for="l">l</label></div>
                <div><input type="checkbox" id="xl">
                    <label for="xl">xl</label></div>
                <div><input type="checkbox" id="xxl">
                    <label for="xxl">xxl</label></div>
            </form>
        </div>
        <div class="product_price">
            <h2>pRICE</h2>
            <form action="#">
                <label>
                    <input type="range" min="10" max="1000" step="1" value="505">
                </label>
            </form>
        </div>
    </section>
    <section class="product_sort">
        <form action="#" class="product_sort_form">
            <label for="SortBy">Sort By</label>
            <select id="SortBy" class="product_sort_form_sort_by">
                <option value="">Name</option>
                <option value="">Price</option>
                <option value="">Featured</option>
            </select>
            <label for="Showw">Show</label>
            <select id="Showw" class="product_sort_form_show">
                <option value="">3</option>
                <option value="">6</option>
                <option value="">9</option>
            </select>
        </form>
    </section>

    <section class="product_box">
        <?php foreach ($product as $item): ?>

            <article class="products">
<!--                <a href="/?c=product&a=card&id=--><?//= $item["id"] ?><!--">-->
                <a href="/product/card?id=<?= $item["id"] ?>">
                    <img src="<?= $item["foto"] ?>" alt="<?= $item["name"] ?>" width="263" height="280">
                </a>

                <div class="products_block">
                    <div class="products_block_text">
                        <h3><?= $item["name"] ?></h3>
                        <p><?= $item["price"] ?></p>
                    </div>
<!--                    <button class="products_buy" value="--><?//= $item["id"]?><!--" name="AddToCart">Add to cart</button>-->
                </div>
            </article>
        <?php endforeach; ?>

    </section>
    <div class="product_nav">
        <nav>
            <ul class="product_pagination">
                <li><a href="#">&lt;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">&gt;</a></li>
            </ul>
        </nav>
        <div class="product_pagination_all">
            <a href="#" class="">View All</a>
        </div>
    </div>
</div>
<section class="product_slider">
    <div>
        <img src="img/icon1.svg" alt="icon1">
        <h4>Free Delivery</h4>
        <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
            models.</p>
    </div>
    <div>
        <img src="img/icon2.svg" alt="icon2">
        <h4>Sales & discounts</h4>
        <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
            models.</p>
    </div>
    <div>
        <img src="img/icon3.svg" alt="icon3">
        <h4>Quality assurance</h4>
        <p>Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
            models.</p>
    </div>
</section>
<section class="last_slider_mob">
    <div class="last_slider_mob_brand">
        <a href="#"><img src="img/media_640px/640px_last_slider_brand1.jpg" alt="brabd1"></a>
        <a href="#"><img src="img/media_640px/640px_last_slider_brand2.jpg" alt="brabd2"></a>
        <a href="#"><img src="img/media_640px/640px_last_slider_brand3.jpg" alt="brabd3"></a>
        <a href="#"><img src="img/media_640px/640px_last_slider_brand4.jpg" alt="brabd4"></a>
    </div>
    <div class="last_slider_shape"></div>
    <div class="last_slider_subscribe_mob">
        <h2>Subscribe</h2>
        <h3>FOR OUR NEWLETTER AND PROMOTION</h3>
        <form action="#" class="last_slider_input">
            <input placeholder="Enter Your Email">
            <button class="last_slider_input_button">Subscribe</button>
        </form>
    </div>
</section>
<section class="last_slider">
    <div class="last_slider_otziv">
        <img src="img/last_slider_photo.png" alt="photo">
        <div class="last_slider_text">
            <p class="last_slider_text_info">“Vestibulum quis porttitor dui! Quisque viverra nunc mi,
                a pulvinar purus condimentum a. Aliquam condimentum mattis neque sed pretium”</p>
            <p class="last_slider_text_name">Bin Burhan</p>
            <p class="last_slider_text__country">Dhaka, Bd</p>
            <div class="last_slider_switch">
                <a href="#" class="last_slider_switch1"></a>
                <a href="#" class="last_slider_switch2 last_slider_switch_active"></a>
                <a href="#" class="last_slider_switch3"></a>
            </div>
        </div>
    </div>
    <div class="last_slider_shape"></div>
    <div class="last_slider_subscribe">
        <h2>Subscribe</h2>
        <h3>FOR OUR NEWLETTER AND PROMOTION</h3>
        <form action="#" class="last_slider_input">
            <input placeholder="Enter Your Email">
            <button class="last_slider_input_button">Subscribe</button>
        </form>
    </div>
</section>