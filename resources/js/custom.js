const { css } = require("jquery");

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
    $('#nav_control').click(function(){
        $('.sidebar').fadeToggle("fast")
        $('.page__inner').toggleClass("pagelg")
        $('.container').toggleClass("pagelg")
        $('.header').toggleClass("pagelg")
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
    
        
    
        $(document).click(function (e) {
            if (!$(e.target).closest('.select').length) {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
            }
        });
    })
}

selectComponent()

let displayPassword = () => {
    let button = document.getElementsByClassName('pass_display'),
    input = document.getElementsByClassName('input_pass')

    function show() {
        var p = document.getElementById('input_pass');
        p.setAttribute('type', 'text');
      }
      
      function hide() {
        var p = document.getElementById('input_pass');
        p.setAttribute('type', 'password');
      }
      
      function showHide() {
        var pwShown = 0;
      
        document.getElementById("pass_display").addEventListener("click", function() {
          if (pwShown == 0) {
            pwShown = 1;
            show();
          } else {
            pwShow = 0;
            hide();
          }
        }, false);
      }
      showHide()
}
// displayPassword()

