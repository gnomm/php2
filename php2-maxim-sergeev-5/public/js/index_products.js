// var newProduct = [];

xhr = new XMLHttpRequest();
xhr.open('GET', 'json/index_products.json', true); //true - Асинхроный запрос
xhr.send();
xhr.onreadystatechange = function () {
    //Коды выполнения запроса
    //0 - запрос не инициализирован
    //1 - загрузка
    //2 - запрос принят сервером
    //3 - идет обмен данными с сервером
    //4 - запрос выполнен
    // console.log(xhr.readyState);

    if (xhr.readyState !== 4) {
        return;
    }

    //Обработка результата ответа сервера
    if (xhr.status !== 200) {
        // console.log('Error', xhr.status, xhr.statusText);
    } else {
        // console.log('Ok async', xhr.responseText);
        var newProduct = JSON.parse(xhr.responseText);
        newProducts(newProduct);
    }
};


function newProducts(newProduct) {
    //конструктор объектов
    class Product {
        constructor(name, price, image, altt, id) {
            this.name = name;
            this.price = price;
            this.image = image;
            this.altt = altt;
            this.id = id;
            this.count = 0;
        }

        show() {
            console.log(this.name);
        }
    }

    //переписываю данные с сервера что бы работать с ними

    var products = [];
    for (var i = 0; i < newProduct.length; i++) {
        products[i] = new Product(
            newProduct[i].name,
            newProduct[i].price,
            newProduct[i].image,
            newProduct[i].altt,
            newProduct[i].id,
        );
    }

    //вывожу все товары в блок товаров
    for (var i = 0; i < products.length; i++) {
        $('.index_slider3_products').append(
            '<article class="index_slider3_products1">' +

            '<a href="#"><img src="img/products/' + products[i].image + '" alt=' + products[i].altt + ' ></a>' +

            '<div class="index_slider3_products_text">' + '<h3>' + products[i].name + '</h3>' +
            '<p class="index_slider3_products_text_pp">' + products[i].price + ' руб. </p>' + '</div>' +

            '<div class="index_slider3_products_active">' +
            '<div class="index_slider3_products_active_2" id="' + products[i].id + '">' +
            '<button class="index_slider3_products_buy">' + '<i class="index_slider3_products_buy_image">' + 'Add to Cart' + '</i>' + '</button>' +
            '</div>' +
            '</article>'
        )
    }
    basket(products);
}

