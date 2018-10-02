xhr = new XMLHttpRequest();
xhr.open('GET', 'json/products_products.json', true); //true - Асинхроный запрос
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
        console.log('Error', xhr.status, xhr.statusText);
    } else {
        // console.log('Ok async', xhr.responseText);
        var newProduct = JSON.parse(xhr.responseText);
        // console.log(newProduct);
        newProducts(newProduct);
    }
};

function newProducts(newProduct) {
    //конструктор объектов
    class Product {
        constructor(name, price, image, altt, hreff, id) {
            this.name = name;
            this.price = price;
            this.image = image;
            this.hreff = hreff;
            this.altt = altt;
            this.id = id,
                this.count = 0;
        }
    }

//переписываю данные с сервера что бы работать с ними
    var products = [];
    for (let i = 0; i < newProduct.length; i++) {
        products[i] = new Product(
            newProduct[i].name,
            newProduct[i].price,
            newProduct[i].image,
            newProduct[i].altt,
            newProduct[i].hreff,
            newProduct[i].id);

    }

//вывожу все товары в блок товаров
    for (let i = 0; i < products.length; i++) {
        $(`.product_box`).append(
            '<article class="products">' +
            '<a href=' + products[i].hreff + '><img src="img/products/' + products[i].image + '" alt= ' + products[i].altt + ' ></a>' +
            '<duv class="products_block" id="' + products[i].id + '">' +
            '<div class="products_block_text">' +
            '<h3>' + products[i].name + '</h3>' +
            '<p>' + products[i].price + ' руб.' + '</p>' +
            '</div>' +
            '<button class="products_buy">Add to Cart</button>' +
            '</duv>' +
            `</article>`
        )
    }
    basket(products);
}


