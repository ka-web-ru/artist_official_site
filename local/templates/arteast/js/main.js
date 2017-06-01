var main =
{
	is_call: false,
	CallUs: function(el)
	{
		if(main.is_call)
		{
			$('#callUs').stop().animate({'opacity':0, 'top': 37}, 300, function() {$(this).css('display', 'none')});
		}
		else
		{
			$('#callBut').show();
			$('#callText').hide();
			$('#callButX').hide();
			$('#callUs').css('display', 'block');
			$('#callUs').stop().animate({'opacity':1, 'top': 50}, 300);
		}
		main.is_call = !main.is_call;
	},
	CallCancel: function(el)
	{
		main.CallUs($(el.parentNode.parentNode.parentNode).find('.hCallB')[0]);
	},
	CallSuccess: function(el)
	{
		if($(el).hasClass('btn')){
			var data = {};
			data['formid'] = 'general';
			data['name'] = $('#f_name').val();
			data['phone'] = $('#f_phone').val();
			data['mail'] = $('#f_mail').val();
			data['time'] = $('#f_time').val();
			$.ajax(
				{
					type: "POST",
					url: "/mail.php",
					data: data,
					success: function(msg)
					{
						$('#callText').html(msg);
						$('#callText').show();
						if(msg == '')
						{
							$('#callText').html('Запрос успешно отправлен');
							$('#callBut').hide();
							$('#callButX').show();
						}
					},
					failed: function(msg)
					{
						Get('mailM').innerHTML = msg;
					}
				});
		}
		if($(el).hasClass('wideprint-callback-submit'))
		{
			var data = {};
			data['formid'] = 'wideprint';
			data['name'] = $('.wideprint-callback-name').val();
			data['phone'] = $('.wideprint-callback-phone').val();
			//console.log(data);
			$.ajax(
				{
					type: "POST",
					url: "/mail.php",
					data: data,
					success: function(msg)
					{
						if(msg == '')
						{
							$('#wideprintCallText').html('Спасибо! Ваша заявка принята.');
						}else{
							$('#wideprintCallText').html(msg);
						}
						$('#wideprintCallText').show();
					},
					failed: function(msg)
					{
						Get('mailM').innerHTML = msg;
					}
				});
		}
	},
}

jQuery(document).ready(function($){
	$("#wideprint-callback-phone,#phone-input-home,#phone-input-modal,#phone-input-scope").mask("(999) 999-99-99");
	
	$('.wideprint-slider-prev').click( function() {
        $('.owl-carousel').trigger('prev.owl.carousel',[300]);
    });
	$('.wideprint-slider-next').click( function() {
        $('.owl-carousel').trigger('next.owl.carousel',[300]);
    });
	$('.btn-mobile-menu').click(function(e){
		e.preventDefault();
		$('.menu').slideToggle();
	});
	$(window).resize(function(){ 
		var wid = $(window).width();
		if (wid > 760 && $('.menu').is(':hidden')){
			$('.menu').removeAttr('style');
		}
	});
	
	//портфолио студии
	//http://cornel.bopp-art.com/lightcase/documentation/
	//console.log(lightcase);
	$('a[data-rel^=lightcase]').lightcase({
		showSequenceInfo: false,
		showTitle: false,
		showCaption: false,
		swipe: true,
		fullScreenModeForMobile: true,
		onStart: {
			function(){
				$('#lightcase-case').append("<a href='#' class='studiya-portfolio-media-close'><img src='/local/templates/arteast/images/studiya/close.png' /></a>");
				//$('#lightcase-case').append("<a href='#' class='lightcase-icon-prev'><img src='/local/templates/arteast/images/studiya/arrow-left.png' /></a>");
				//$('#lightcase-case').append("<a href='#' class='lightcase-icon-next'><img src='/local/templates/arteast/images/studiya/arrow-right.png' /></a>");
			}
		}
	});
	//maxWidth: 560,
	//maxHeight: 315,
	$(document).on('click','.studiya-portfolio-media-close',function(e){
		//console.log('11');
		e.preventDefault();
		lightcase.close();
	});
/* 	$(document).on('click','.studiya-portfolio-media-prev',function(e){
		console.log('22');
		e.preventDefault();
		//lightcase.prev();
		
	});
	$(document).on('click','.studiya-portfolio-media-next',function(e){
		console.log('33');
		e.preventDefault();
		//lightcase.next();
		console.log(lightcase.markup);
	}); */
	
	//форма обратной связи в модальном окне на странице студии
    $(".close,.overlay").click(function(){
        $('.popup').css('display','none');
        $('.result-box, .overlay').hide();
        //$(".btn-form-show").css('display','block');
        //сброс сообщений валидатора
        var phone = $('[name=phone]');
        phone.attr('placeholder',null);
        phone.css('border','none');
        $('.contact-form-modal, .contact-form')[0].reset(); //очистить поля
    });
    $(".btn-form-show, .btn-show-text").click(function(e){
        e.preventDefault();
        $('.overlay').show();
        $('.popup').css('display','block');
        $('.contact-form-modal').css('display','block');
        var n = String((($(window).width()-$('.contact-form-wrapper').width())/2)) + 'px';
        //console.log(n);
        $(".popup").animate({right: n}, 500);
        $('.close').css('display','block');
        //$(".btn-form-show").css('display','none');
    });
	
	//Отправка формы обратной связи на странице студии
    $('.btn-form').click( function(e) {
        //валидатор
        //var phone = $(this).siblings('[name=phone-input]');
        var phone = $(this).parents('.contact-form, .contact-form-modal').find('[name=phone]');
        //console.log(phone.val());
        if (phone.val() == ''){
            phone.attr('placeholder','Укажите телефон');
            phone.css('border','1px solid red');
            phone.css('border-radius','13px');
            return false;
        } else {
            phone.attr('placeholder',null);
            phone.css('border','none');
        }
        //отменить стандартное действие при отправке формы
        e.preventDefault();
        //var m_data=$(this).parent('.contact-form, .contact-form-modal').serialize();
        var m_data ={};
		m_data['formid'] = 'studiya';
        $(this).parents('.contact-form, .contact-form-modal').find('input, select, textarea').each(function() {
            if($(this).attr('type').toLowerCase() != 'checkbox') {
                m_data[$(this).attr('name')] = this.value;
            }
            else {
                m_data[$(this).attr('name')] = this.checked;
            }
        });
        console.log( m_data );
        $.ajax({
            type: 'POST',
            url: '/mail.php',
            data: m_data,
            success: function(result){ //Если всё хорошо
                //для ответа из формы встроенной в страницу
                if ($('#openModal').css('display') == 'none'){
                    $('.overlay').show();
                    $('.popup').css('display','block');
                    $('.close').css('display','block');
                }
				if(result == ''){
					$('.contact-form-modal').css('display','none');
					$('.result-box').html('Спасибо! Ваша заявка принята. ').show();
				}else {
					$('.contact-form-modal').css('display','none');
					$('.result-box').html(result).show();
				}
                
            },
            error: function(result) { //Если ошибка
                $('.contact-form-modal').css('display','none');
                $('.result-box').html('Ошибка: ' + result).show();
            }
        });
    });
	
	
});