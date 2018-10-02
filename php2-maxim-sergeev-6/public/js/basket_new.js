//корзина
function basket(products) {
    var cart = {
        basketProducts: [],
        amount: 0,
        // test: JSON.parse(localStorage.getItem("cart")),


        add: function (id) {
            for (var i = 0; i < products.length; i++) {
                if (products[i].id == id) {

                    products[i].count++;
                    this.basketProducts[i] = products[i];
                    console.log(this.basketProducts[i].id)
                }
            }
            // localStorage.setItem("cart", JSON.stringify(this.basketProducts));
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
                }
            }
        },

        show: function () {
            $('.header_1_basket').empty();
            for (var i = 0; i < this.basketProducts.length; i++) {
                if (products[i].count > 0) {
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
            this.basketProducts.length = 0;
            $('#numberGoods').html(' ');
            $('.header_1_basket').html('Корзина пуста');

        },

        reset: function (event) {
            this.basketProducts = this.basketProducts.filter(function (e) {
                return e
            });
var wert;
            for (let i = 0; i < this.basketProducts.length; i++) {
                if (this.basketProducts[i].id === +event.target.dataset.id) {
                    console.log(event.target.dataset.id)
                    // $('#test').remove();
                    // this.basketProducts.splice(i,1)
                    // wert = document.getElementById(this.basketProducts[i].id);
                    // wert.parentNode.removeChild(wert);

                    // $('#4').remove();
                   // document.getElementById(event.target.dataset.id).remove();
                    // document.getElementById("4").outerHTML='';


                    console.log(this.basketProducts)
                }

            }


            //     /**
            //      * Удаляет товар из корзины
            //      * @param {MouseEvent} event Событие клика мышью
            //      */
            //     deleteFromCart(event) {
            //         for (let i = 0; i < productsInCart.length; i++) {
            //             if (productsInCart[i].id === +event.target.dataset.id) {
            //                 this.totalCartSettings.totalQty -= productsInCart[i].qty;
            //                 this.totalCartSettings.totalPrice -= productsInCart[i].price * productsInCart[i].qty;
            //                 productsInCart.splice(i, 1);
            //             }
            //         }
            //         this.createListContainer();
            //         this.outputQtyTotalPrice();
            //         localStorage.setItem("cart", JSON.stringify(productsInCart));
            //     },
            // };


        }
    };

//добавление товара в корзину
    $('body').on('click', '.index_slider3_products_buy', function () {
        // console.log('aaaaa')
        cart.add($(this).parent().attr('id'));
        cart.calculate();
        cart.show();


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

