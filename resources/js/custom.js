const { css } = require("jquery");
import requests from "./components/requsts"
import datepickerConfig from './components/datepickerConfg'

$("body").on('click', '.show-hide-password', function () {
   if($(this).data('state') === 'show'){
       $(this).addClass('fa-eye-slash');
       $(this).removeClass('fa-eye');
       $(this).data('state', 'hide')
       $('input#password').prop('type', 'text')
       $(this).prop('title', 'Скрыть пароль')
   }else{
       $(this).removeClass('fa-eye-slash');
       $(this).addClass('fa-eye');
       $(this).data('state', 'show')
       $('input#password').prop('type', 'password')
       $(this).prop('title', 'Показать пароль')
   }
});

$('body').on('click', '.generate-user', function(e){
    var userName = generateString(10);
    var userPassword = generateStringPassword(16);

    $('#password').val(userPassword);
    $('#name').val(userName);
    $('#email').val(userName + '@zov.ru');

});

function generateString(length) {
    var result           = '';
    var characters       = 'abcdefghijklmnopqrstuvwxyz';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function generateStringPassword(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!";#$%&()*+,-./:;<=>?@[]^_`{|}~';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

$('body').on('click', '.copy-password', function(e){
    copytext('input#password');
    $('span.copied-text').show(400)
    setTimeout(function() {
        $(".copied-text").hide(400)
    }, 3000);
})

function copytext(el) {
    var $tmp = $("<textarea>");
    $("body").append($tmp);
    $tmp.val($(el).val()).select();
    document.execCommand("copy");
    $tmp.remove();
}

$('select#salons option:first').attr('disabled', true);

$('#salons ').on('change', function () {
    console.log(this.value)
    $(this).find('option:selected').css('background', 'lightgray')
    if($('span[data-salon-id="'+this.value+'"]').length === 0){
        $('.checked-salons').append(`
       <span data-salon-id="`+this.value+`" class="checked-salons__item">` + $(this).find('option:selected').text() + `<span class="checked-salons__delete">
       <i class="fa fa-trash-o" ></i>
       </span><input type="hidden" name="salons[]" value="`+this.value+`">
       </span>`)
    }else {
        $('span[data-salon-id="'+this.value+'"]').remove()
        $(this).find('option:selected').attr('style', '')
    }
})


let handleControlSidebar = () => {
    
    
    var clickState = 0;
    var btn = document.getElementById('nav_control');

    btn.addEventListener('click', function(){
        $('.sidebar').fadeToggle("fast")
        $('.page__inner').toggleClass("pagelg")
        $('.container').toggleClass("pagelg")
        $('.header').toggleClass("pagelg")
        

         if (clickState == 0) {
            sessionStorage.removeItem("stateSidebar");
            clickState = 1;
        } else {
            sessionStorage.setItem('stateSidebar', 'hidden')
            clickState = 0;
        }

    });

}
handleControlSidebar()

let currentYear = () => {
    let today = new Date();
    let year = today.getFullYear();
    document.getElementById("currentYear").innerHTML = year
}
currentYear() 

let selectComponent = () => {
    jQuery(($) => {
		
    
        $('.select').on('click', '.select__head', function () {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open'); 
                $(this).next().fadeOut();
            } else {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
                $(this).addClass('open');
                $(this).next().fadeIn();
            }
        });
    
        $('.select').on('click', '.select__item', function () {
            $('.select__head').removeClass('open');
            $(this).parent().fadeOut();
            $(this).parent().prev().text($(this).text());
            $(this).parent().prev().prev().val($(this).data("value"));

        });

        $('.select').on('click', '.select__value', function () {
            let data = () => {
                $(this).parent().prev().text($(this).val());
                $(this).parent().prev().prev().val($(this).val());
            } 
            $('.apply-btn').click(function () {
                data()
            });
        });

        $('.select').on('input', '.select__value', function () {
            $(this).parent().prev().text($(this).val());
            $(this).parent().prev().prev().val($(this).val());
        });
    
        $(document).click(function (e) {
            if (!$(e.target).closest('.select').length) {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
            }
        });
    })
}

selectComponent()


let activeMenuItem = () => {
    let menues = document.getElementsByClassName('sidebar__item')
    menues = [].slice.call(menues)

    menues.map(menu => {
        let path = window.location.pathname,
            route = menu.dataset.route

        if(route == path || route + '.html' == path) {
            menu.classList.add("active")
        }
    })
}
activeMenuItem()

let rememberState = function() {
        
    let sessionlVal = sessionStorage.getItem('stateSidebar')
    if (sessionlVal == 'hidden') {
        $('.sidebar').fadeOut("fast")
        $('.page__inner').addClass("pagelg")
        $('.container').addClass("pagelg")
        $('.header').addClass("pagelg")
        
    } else {
        $('.sidebar').fadeIn("fast")
        $('.page__inner').removeClass("pagelg")
        $('.container').removeClass("pagelg")
        $('.header').removeClass("pagelg")
    }
    console.log(sessionlVal)
}

rememberState()

requests()
datepickerConfig()