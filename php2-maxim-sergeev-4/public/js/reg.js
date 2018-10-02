(function ($) {
    $(function () {
        $('#formCity').on('input', function () {
            let citieNamePart = $(this).val();
            if (citieNamePart.length >= 3) {
                $('#cityList option').remove();
                $.get('http://geoapi.spacenear.ru/api.php?method=getCities&countryId=1&pattern=' + citieNamePart, function (data) {
                    let result = JSON.parse(data);
                    for (let i = 0; i < result.length; i++) {
                        $('<option>', {
                            text: result[i].name
                        }).appendTo('#cityList');
                    }
                });
            }
        })
    });
})(jQuery);


let regName = /^[A-Za-zА-Яа=фЁё]+$/i;
let regPhone = /^\+\d\(\d{3}\)\d{3}-\d{4}$/;
let regCity = /^[A-Za-zА-Яа=фЁё-]+$/i;
let regEmail = /^([a-z0-9-_]+\.)*[a-z0-9-_]+@[a-z0-9-_]+(\.[a-z0-9-_]+)*\.[a-z]{2,6}$/;

function validate(reg, input, helpBlockId, textError) {
    if (!reg.test(input.value)) {
        input.value = '';
        input.parentElement.classList.remove('has-success');
        input.parentElement.classList.add('has-error');
        document.querySelector(helpBlockId).innerHTML = textError;
    }
    if (reg.test(input.value)) {
        input.parentElement.classList.remove('has-error');
        input.parentElement.classList.add('has-success');
        document.querySelector(helpBlockId).innerHTML = '';
    }
}

const formButton = document.querySelector('.formButton');
formButton.addEventListener('click', (event) => {
    event.preventDefault();
    let name = document.querySelector('#formName');
    let phone = document.querySelector('#formTel');
    let email = document.querySelector('#formEmail');
    let city = document.querySelector('#formCity');


    validate(regName, name, '#helpFormName', 'Имя может содержать только буквы латинского или русского алфавита');
    validate(regCity, city, '#helpFormCity', 'Имя города может содержать только буквы.');
    validate(regPhone, phone, '#helpFormTel', 'Телефон должен иметь формат +Х(ХХХ)ХХХ-ХХХХ.');
    validate(regEmail, email, '#helpFormEmail', 'Неверный формат email.');


    if (regName.test(name.value) && regPhone.test(phone.value) && regCity.test(city.value) && regEmail.test(email.value)) {
        // document.querySelector('.formRegistration').innerHTML = 'Вы успешно прошли регистрацию';
        $.ajax({
            url: './json/registerUser.json',
            dataType: 'json',
            success: function (result) {
                $('.formRegistration').html(result.userMessage);
            }
        });
    }
});

