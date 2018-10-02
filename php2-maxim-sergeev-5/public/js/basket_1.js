var cart = {
    basketProducts: [],
    amount: 0,
    numberGoods: 0,
    count: 0,
    test: JSON.parse(localStorage.getItem("cart")),
}


function basket(products) {
    // console.log(products)
    add(products);
    // calculate();
    // show()
}

function add(products) {
    // console.log(products)
    // console.log(event.target)
    for (var i = 0; i < products.length; i++) {

        if (products[i].id == products[i].id) {
            products[i].count++;
            // cart.count++;
            // console.log(cart.count)
            console.log(products[i].count)
            // console.log(cart.basketProducts)
            cart.basketProducts[i] = products[i];
            // cart.count++;
            // console.log(cart.count);

            // console.log(cart.basketProducts[i].id)
        }
    }
}

function calculate() {
    // let amount = 0,
    //     numberGoods = 0;
    for (var i = 0; i < cart.basketProducts.length; i++) {
        if (products[i].count > 0) {
            for (var j = 0; j < cart.basketProducts[i].count; j++) {
                cart.amount += cart.basketProducts[i].price;
            }
            cart.numberGoods += products[i].count;
            // cart.numberGoods += cart.count;
        }
    }
}

function show() {
    $('.header_1_basket').empty();
    for (var i = 0; i < cart.basketProducts.length; i++) {
        if (products[i].count > 0) {
            // if (cart.count[i] > 0) {
            $('.header_1_basket').append(
                '<div class="header_1_basket_item">' +
                '<div>' +
                '<span class="header_1_basket_item-name">' + cart.basketProducts[i].name + '</span> - ' +
                '<span class="header_1_basket_item-amount">' + cart.basketProducts[i].count + ' шт. ' + '</span>' +
                '</div>' +
                '<div class="header_1_basket_item_basket" data-id="' + cart.basketProducts[i].id + '"></div>' +
                '</div>'
            );
        }
        $('#numberGoods').html(cart.numberGoods)
    }

    $('.header_1_basket').append(
        '<div class="header_1_basket_total">' +
        '<div class="header_1_basket_amount">Общая цена: <span class="header_1_basket_amount_text">' + cart.amount + ' руб.</span></div>' +
        '<div class="header_1_basket_block">' +
        '<div class="header_1_basket_reset">Очистить все</div>' +
        '<a class="header_1_basket_basket" href="basket.html">Перейти в корзину</a>' +
        '</div>' +
        '</div>'
    );
}

function resetAll() {
    for (var i = 0; i < cart.basketProducts.length; i++) {
        products[i].count = 0;
    }
    console.log(products[i].count)
    cart.basketProducts.length = 0;
    $('#numberGoods').html(' ');
    $('.header_1_basket').html('Корзина пуста');
}

function reset() {
    cart.basketProducts = cart.basketProducts.filter(function (e) {
        return e
    });

    for (let i = 0; i < cart.basketProducts.length; i++) {
        if (cart.basketProducts[i].id === +event.target.dataset.id) {
            // console.log(event.target.dataset.id)
            // --;
            // console.log(products[i].count);
            cart.basketProducts.splice(i, 1);
            // products[i].count -= products[i].count
            // products[i].count -= products[i].count;
            // console.log(products[i].count)
            // console.log(cart.basketProducts.length)
            // console.log(cart.numberGoods);
        }
        if (cart.basketProducts.length === 0) {
            // console.log(cart.basketProducts.length)
            // products[i].count = 0
            // // products.count = 0;
            $('#numberGoods').html(' ');
            $('.header_1_basket').html('Корзина пуста');
            products[i].count = 0;
            cart.numberGoods = 0;
            // cart.basketProducts.length = 0;
            // cart.basketProducts[i].count = 0;
            // products[i].count = 0;
            // console.log(products[i].count)
            // console.log(cart.basketProducts[i].count)
        }
    }
    localStorage.setItem("cart", JSON.stringify(cart.basketProducts));
    cart.calculate();
    cart.show();
}

//добавление товара в корзину
$('body').on('click', '.index_slider3_products_buy', function () {
    // console.log('aaaaa')
    // console.log(cart.count)
    add($(this).parent().attr('id'));
    calculate();
    show();

});

//добавление товара в корзину
$('body').on('click', '.products_buy', function () {
    // console.log('aaaaa')
    add($(this).parent().attr('id'));
    calculate();
    show();


});


//очистка всех товаров в корзине
$('body').on('click', '.header_1_basket_reset', function () {
    resetAll();
});

$('body').on('click', '.header_1_basket_item_basket', function () {
    reset(event);
    // cart.add(event)

});