"use strict";

//корзина
function basket(products) {
    var cart = {
            basketProducts: [],
            amount: 0,

            // Получаем данные
            getCartData: function () {
                return this.basketProducts = JSON.parse(localStorage.getItem('cart'));
            },

            // // Возвращаем данные
            // getData: function () {
            //     return this.basketProducts;
            // },

            /**
             * сохранение в localStorage
             * @returns {*}
             */
            setCartData: function () {
                localStorage.setItem('cart', JSON.stringify(this.basketProducts));
                return false;
            },

            // clearData: function () {
            //     this.basketProducts = [];
            //     saveData();
            //     return this.basketProducts;
            // },

            add: function (id) {
                this.disabled = true; // блокируем кнопку на время операции с корзиной
                this.basketProducts = getCartData() || {};
                for (var i = 0; i < products.length; i++) {
                    if (products[i].id == id) {
                        products[i].count++;
                        this.basketProducts[i] = products[i];
                    }
                    if(!setCartData(this.basketProducts)){ // Обновляем данные в LocalStorage
                        this.disabled = false; // разблокируем кнопку после обновления LS
                    }
                }
                return false
            },

            calculate: function () {
                cart.amount = 0;
                cart.numberGoods = 0;
                for (var i = 0; i < products.length; i++) {
                    if (products[i].count > 0) {
                        for (var j = 0; j < products[i].count; j++) {
                            cart.amount += products[i].price;
                        }
                        cart.numberGoods += products[i].count;
                    }
                }
            },

            show: function () {
                $('.header_1_basket').empty();

                for (var i = 0; i < products.length; i++) {
                    if (products[i].count > 0) {
                        $('.header_1_basket').append(
                            '<div class="header_1_basket_item">' +
                            '<div>' +
                            '<span class="header_1_basket_item-name">' + products[i].name + '</span> - ' +
                            '<span class="header_1_basket_item-amount">' + products[i].count + ' шт. ' + '</span>' +
                            '</div>' +
                            '<div class="header_1_basket_item_basket"></div>' +
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
            ,

            resetAll: function () {
                for (var i = 0; i < products.length; i++) {
                    products[i].count = 0;
                }
                this.basketProducts.length = 0;
                $('#numberGoods').html(' ');
                $('.header_1_basket').html('Корзина пуста');

            }
            ,

            reset: function () {
                this.basketProducts = this.basketProducts.filter(function (e) {
                    return e
                });


                // for (let i = 0; i < this.basketProducts.length; i++) {
                //     for (let n=0; n < products.length; n++) {
                //         if (this.basketProducts.id == pro) {
                //
                //         }
                //     }
                //     // this.basketProducts[i].id = id;
                //     // console.log(this.basketProducts[i].id)
                //     // console.log(id);
                //     // console.log(this.basketProducts[i].id)
                //
                //
                //     // if (this.basketProducts[i].bass === basketId) {
                //     //     // console.log(bass);
                //     //     // this.basketProducts.splice(this.basketProducts.indexOf(this.basketProducts[i],1))
                //     //     // console.log(cart.basketProducts[i]);
                //     // }
                //     // console.log(this.basketProducts[i]);
                // }

            }
        }
    ;

// Получаем данные из LocalStorage
    function getCartData() {
        return JSON.parse(localStorage.getItem('cart'));
    }

// Записываем данные в LocalStorage
    function setCartData(o) {
        localStorage.setItem('cart', JSON.stringify(o));
        return false;
    }

//добавление товара в корзину
    $('body').on('click', '.index_slider3_products_buy', function () {
        // console.log('aaaaa')
        cart.add($(this).parent().attr('id'));
        cart.calculate();
        cart.show();
    });

    //добавление товара в корзину
    $('body').on('click', '.products_buy', function () {
        // console.log('aaaaa');
        cart.add($(this).parent().attr('id'));
        cart.calculate();
        cart.show();
    });


//очистка всех товаров в корзине
    $('body').on('click', '.header_1_basket_reset', function () {
        cart.resetAll();
    });

    $('body').on('click', '.header_1_basket_item_basket', function () {
        cart.reset();
    });
}

