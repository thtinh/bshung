jQuery(document).ready(function($) {

    var ajax_sendding = false;

    $('.form-dathen button[name=datlichhen]').on('click', function(){

        if(ajax_sendding == true){
            return false;
        }
        $('.form-dathen .message-success').hide();
        $('.form-dathen .img-container').show();

        ajax_sendding = true;
        var hovaten = $('.form-dathen input[name=hovaten]').val();
        var dienthoai = $('.form-dathen input[name=dienthoai]').val();
        var email = $('.form-dathen input[name=email]').val();
        var dichvu = $('.form-dathen input[name=dichvu]').val();
        var ngay = $('.form-dathen input[name=ngay]').val();
        var gio = $('.form-dathen input[name=gio]').val();
        var content = $('.form-dathen input[name=content]').val();
        var data = {
            'action': 'add_appointment',
            'security': ajax_object.ajax_nonce,
            'hovaten': hovaten,
            'dienthoai' : dienthoai,
            'email' : email,
            'ngay' : ngay,
            'gio' : gio,
            'dichvu' : dichvu,
            'content': content,
        };

        jQuery.ajax({
            url : ajax_object.ajaxurl,
            type : "post",
            dateType:"text",
            data : data,
            success : function (response){
                if(response == 1)
                {
                	$('.form-dathen .message').hide();
                	$('.form-dathen .message-success').show();
                	var ngay = $('.form-dathen input[name=ngay]').val('');
        			var gio = $('.form-dathen input[name=gio]').val('');
                    var content = $('.form-dathen input[name=content]').val('');
                }
                else
                {
                	$('.form-dathen .message-success').hide();
                    $('.form-dathen .message').html(response);
                }
            },
            timeout: 20000
        })
        .always(function(){
            ajax_sendding = false;
            $('.form-dathen .img-container').hide();
        });
    });

    $('.form-dathen-mobile button[name=datlichhen]').on('click', function(){

        if(ajax_sendding == true){
            return false;
        }
        $('.form-dathen-mobile .message-success').hide();
        $('.form-dathen-mobile .img-container').show();

        ajax_sendding = true;
        var hovaten = $('.form-dathen-mobile input[name=hovaten]').val();
        var dienthoai = $('.form-dathen-mobile input[name=dienthoai]').val();
        var email = $('.form-dathen-mobile input[name=email]').val();
        var dichvu = $('.form-dathen-mobile input[name=dichvu]').val();
        var ngay = $('.form-dathen-mobile input[name=ngay]').val();
        var gio = $('.form-dathen-mobile input[name=gio]').val();
        var content = $('.form-dathen-mobile input[name=content]').val();
        var data = {
            'action': 'add_appointment',
            'security': ajax_object.ajax_nonce,
            'hovaten': hovaten,
            'dienthoai' : dienthoai,
            'email' : email,
            'ngay' : ngay,
            'gio' : gio,
            'dichvu' : dichvu,
            'content': content,
        };

        jQuery.ajax({
            url : ajax_object.ajaxurl,
            type : "post",
            dateType:"text",
            data : data,
            success : function (response){
                if(response == 1)
                {
                    $('.form-dathen-mobile .message').hide();
                    $('.form-dathen-mobile .message-success').show();
                    var ngay = $('.form-dathen-mobile input[name=ngay]').val('');
                    var gio = $('.form-dathen-mobile input[name=gio]').val('');
                    var content = $('.form-dathen-mobile input[name=content]').val('');
                }
                else
                {
                    $('.form-dathen-mobile .message-success').hide();
                    $('.form-dathen-mobile .message').html(response);
                }
            },
            timeout: 20000
        })
        .always(function(){
            ajax_sendding = false;
            $('.form-dathen-mobile .img-container').hide();
        });
    });
});