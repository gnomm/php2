//корзина
function basket(products) {
    var cart = {
        basketProducts: [],
        amount: 0,
        numberGoods: 0,
        count: 0,


        add: function (id) {
            cart.basketProducts = JSON.parse(localStorage.getItem('cart')) || [];
            for (var i = 0; i < products.length; i++) {
                if (products[i].id == id) {
                    products[i].count++;
                    // this.count++;
                    // console.log(this.count)
                    // console.log(products[i].count)
                    this.basketProducts[i] = products[i];
                    // this.count++;
                    // console.log(this.count);

                    // console.log(this.basketProducts[i].id)
                }
            }
            localStorage.setItem("cart", JSON.stringify(cart.basketProducts));
        },

        calculate: function () {
            this.amount = 0;
            this.numberGoods = 0;
            for (var i = 0; i < this.basketProducts.length; i++) {
                if (products[i].count > 0) {
                    for (var j = 0; j < this.basketProducts[i].count; j++) {
                        this.amount += this.basketProducts[i].price;
                    }
                    this.numberGoods += products[i].count;
                    // this.numberGoods += this.count;
                }
            }
        },

        show: function () {
            $('.header_1_basket').empty();
            for (var i = 0; i < this.basketProducts.length; i++) {
                if (products[i].count > 0) {
                    // if (this.count[i] > 0) {
                    $('.header_1_basket').append(
                        '<div class="header_1_basket_item">' +
                        '<div>' +
                        '<span class="header_1_basket_item-name">' + this.basketProducts[i].name + '</span> - ' +
                        '<span class="header_1_basket_item-amount">' + this.basketProducts[i].count + ' шт. ' + '</span>' +
                        '</div>' +
                        '<div class="header_1_basket_item_basket" data-id="' + this.basketProducts[i].id + '"></div>' +
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
        },

        resetAll: function () {
            for (var i = 0; i < this.basketProducts.length; i++) {
                products[i].count = 0;
            }
            localStorage.clear();
            this.basketProducts.length = 0;
            $('#numberGoods').html(' ');
            $('.header_1_basket').html('Корзина пуста');

        },

        reset: function (event) {
            this.basketProducts = this.basketProducts.filter(function (e) {
                return e
            });

            for (let i = 0; i < this.basketProducts.length; i++) {
                if (this.basketProducts[i].id === +event.target.dataset.id) {
                    console.log(event.target.dataset.id)
                    // --;
                    // console.log(products[i].count);
                    // products[i].count = products[i].count - 1
                    products[i].count = 0;
                    this.basketProducts.splice(i, 1);

                    // products[i].count -= products[i].count;
                    console.log(products[i].count)
                    // console.log(this.basketProducts.length)
                    // console.log(this.numberGoods);
                }
                // if (this.basketProducts.length === 0) {
                //     // console.log(this.basketProducts.length)
                //     // products[i].count = 0
                //     // // products.count = 0;
                //     $('#numberGoods').html(' ');
                //     $('.header_1_basket').html('Корзина пуста');
                //     products[i].count = 0;
                //     this.numberGoods = 0;
                //     // this.basketProducts.length = 0;
                //     // this.basketProducts[i].count = 0;
                //     // products[i].count = 0;
                //     console.log(products[i].count)
                //     // console.log(this.basketProducts[i].count)
                // }
            }
            localStorage.setItem("cart", JSON.stringify(cart.basketProducts));
            cart.calculate();
            cart.show();
        }
    };

//добавление товара в корзину
    $('body').on('click', '.index_slider3_products_buy', function () {
        // console.log('aaaaa')
        // console.log(this.count)
        cart.add($(this).parent().attr('id'));
        cart.calculate();
        cart.show();
        console.log(cart.basketProducts)

    });

    //добавление товара в корзину
    $('body').on('click', '.products_buy', function () {
        // console.log('aaaaa')
        cart.add($(this).parent().attr('id'));
        cart.calculate();
        cart.show();
    });


//очистка всех товаров в корзине
    $('body').on('click', '.header_1_basket_reset', function () {
        cart.resetAll();
    });

    $('body').on('click', '.header_1_basket_item_basket', function () {
        cart.reset(event);

    });

}


