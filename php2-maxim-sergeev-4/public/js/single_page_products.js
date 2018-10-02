xhr = new XMLHttpRequest();
xhr.open('GET', 'json/single_page_products.json', true); //true - Асинхроный запрос

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
        console.log('Error', xhr.status, xhr.statusText);
    } else {
        // console.log('Ok async', xhr.responseText);
        var newProduct = JSON.parse(xhr.responseText);
        // console.log(newProduct);
    }


    //конструктор объектов
    class Product {
        constructor(name, price, image, altt, hreff) {
            this.name = name;
            this.price = price;
            this.image = image;
            this.hreff = hreff;
            this.altt = altt;
        }
    }

    //переписываю данные с сервера что бы работать с ними
    products = [];
    for (let i = 0; i < newProduct.length; i++) {
        products[i] = new Product(
            newProduct[i].name,
            newProduct[i].price,
            newProduct[i].image,
            newProduct[i].altt,
            newProduct[i].hreff);
    }

    //вывожу все товары в блок товаров
    for (let i = 0; i < products.length; i++) {
        $(`.page_slider3_product`).append(
            '<article class="products"' + '">' +
            '<a href=' + products[i].hreff + '><img src="img/products/single_page/' + products[i].image + '" alt= ' + products[i].altt + ' ></a>' +
            '<h3>' + products[i].name + '</h3>' +
            '<p>' + products[i].price + ' руб.' + '</p>' +
            `</article>`
        )
    }
};
xhr.send();