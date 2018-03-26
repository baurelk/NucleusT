$(function () {
    
    // $('body').css('height', '5000px');
    $('div.shadow').css('width', $('div.register-box').width());
    $('div.profile-shadow').css('height', $('div.profile-header').height());
        
    window.onresize = function() {
        $('div.shadow').css('width', $('div.register-box').width());
        $('div.profile-shadow').css('height', $('div.profile-header').height());
    };

    //#region Menu

    $('img#menu').click(function () {
        $('section#menu').slideDown(300);
    });

    $('.back-button').click(function () {
        $('section#menu').slideUp(300);
    });
    
    $('img#menu').click(function () {
        if ($('div.user-menu').hasClass('visible') == false) {
            $('div.user-menu').slideDown(300);
            $('div.user-menu').css('display', 'flex');
            $('div.user-menu').addClass('visible');
            $('div.user-menu').removeClass('not-visible');            
        } else {
            $('div.user-menu').slideUp(300);
            $('div.user-menu').addClass('not-visible');
            $('div.user-menu').removeClass('visible');            
        }
    });

    //#endregion

    $('button#donorButton').click(function () {
        document.location.replace('user_login.html');
    });

    $('button#seekerButton').click(function () {
        document.location.replace('user_login.html');
    });

    $('section.main', 'div.shadow').click(function () {
        if ($('div.user-menu').hasClass('visible')) {
            $('div.user-menu').slideUp(300);
            $('div.user-menu').addClass('not-visible');
            $('div.user-menu').removeClass('visible');    
        }
    });

    $('button.register-btn').click(function () {
        if ($(this).text() === 'REGISTER NOW') {
            $('label#name-label').slideDown(300);
            $('input#username').slideDown(300);
            $('label#group-label').slideDown(300);
            $('select#bloodgroup').slideDown(300);
            $(this).text('LOGIN NOW');
            $('a.recover-password').fadeOut(300);
            $('button.login-button').text('REGISTER NOW');
            $('button.login-button').attr('class', 'register-button');
        } else {
            $('label#name-label').slideUp(300);
            $('input#username').slideUp(300);
            $('label#group-label').slideUp(300);
            $('select#bloodgroup').slideUp(300);
            $(this).text('REGISTER NOW');
            $('a.recover-password').fadeIn(300);
            $('button.register-button').text('LOGIN NOW');
            $('button.register-button').attr('class', 'login-button');
        }
    });

    //#region Dashboard Option Animations

    $('div.option').hover(function () {
        $(this).css('background', '#D13B3B');
        $(this).css('border-color', '#D13B3B');
        $(this).css('color', '#fff');
        $(this).find('a').css('color', '#fff');
        $(this).find('.separator').css('background', '#fff');
    });

    $('div.option').mouseleave(function () {
        $(this).css('background', 'transparent');
        $(this).css('border-color', '#fff');
    });

    //#endregion

});