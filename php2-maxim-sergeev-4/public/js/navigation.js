"use strict";

window.onload = function () {
//Вызов метода, запускающий Ajax запрос на получение Json
    jsonRequest("json/navigation.json");
};

class Navigation {
    constructor(json) {
        this.json = json;
        this.jsonMenu = this.render(this.json);
    }

    render(json) {
        //Здесь весь фарш. Отрисовка меню. При вызове передаётся файл json
        let jsonMenu = JSON.parse(json).menu;
        let container = document.getElementById("header__navigation");
        // console.log(jsonMenu);
        //Отрисовка основного меню
        for (let i = 0; i < jsonMenu.length; i++) {
            let ul = document.createElement("ul");
            ul.classList.add(jsonMenu[i].class);
            ul.setAttribute("id", jsonMenu[i].id);
            let a = document.createElement("a");
            a.setAttribute("href", jsonMenu[i].href);
            a.classList.add("navigation__link");
            a.textContent = jsonMenu[i].content;
            a.setAttribute("href", jsonMenu[i].href);
            ul.appendChild(a);
            let dropdown = document.createElement("div");
            dropdown.classList.add("dropdown");
            container.appendChild(ul);
            //Если есть подменю
            if (jsonMenu[i].tabs.length > 0) {
                //То запускаем цикл
                for (let n = 0; n < jsonMenu[i].tabs.length; n++) {
                    //Если в подменю нет ещё одной вложенности, то просто отрисовываем подменю
                    if (!jsonMenu[i].tabs[n].object) {
                        let subUl = document.createElement("ul");
                        let subLi = document.createElement("li");
                        let subA = document.createElement("a");
                        subA.setAttribute("href", jsonMenu[i].tabs[n].href);
                        subA.textContent = jsonMenu[i].tabs[n].name;
                        subLi.appendChild(subA);
                        subUl.appendChild(subLi);
                        dropdown.appendChild(subUl);
                        ul.appendChild(dropdown);
                    } else {
                        //Если вложенность есть, то отрисовываем подменю с этими вложенностями. Можно уже начинать рыдать. 
                        let subUl = document.createElement("ul");
                        let subLi = document.createElement("li");
                        subLi.textContent = jsonMenu[i].tabs[n].object;
                        subUl.appendChild(subLi);
                        dropdown.appendChild(subUl);
                        ul.appendChild(dropdown);
                        for (let m = 0; m < jsonMenu[i].tabs[n].tabs.length; m++) {
                            if (jsonMenu[i].tabs[n].tabs[m].name === "image") {
                                let subSubA = document.createElement("a");
                                subSubA.setAttribute("href", jsonMenu[i].tabs[n].tabs[m].href);
                                let subSubImg = document.createElement("img");
                                subSubImg.setAttribute("src", jsonMenu[i].tabs[n].tabs[m].src);
                                subSubImg.setAttribute("alt", jsonMenu[i].tabs[n].tabs[m].alt);
                                subSubA.appendChild(subSubImg);
                                subUl.appendChild(subSubA);
                                continue;
                            }
                            let subSubA = document.createElement("a");
                            subSubA.textContent = jsonMenu[i].tabs[n].tabs[m].name;
                            subSubA.setAttribute("href", jsonMenu[i].tabs[n].tabs[m].href);
                            subUl.appendChild(subSubA);
                        }
                    }
                }
            }
        }
    }

    //Всё отрисовано.
}

//Сам запрос. При вызове в него передаётся ссылка на файл JSOn
function jsonRequest(src) {
    let xhr = new XMLHttpRequest();
    let result = "";
    xhr.onreadystatechange = function () {
        //Проверка ответа. Если запрос успешен, создаём класс навигации, где всё происходит
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                result = xhr.responseText;
                new Navigation(result);
                return JSON.parse(result);
            } else {
                console.log(`что-то пошло не так`);
            }
        }
    };
    xhr.open("GET", src);
    xhr.send();
}