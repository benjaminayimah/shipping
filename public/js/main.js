/* sidenav-toggles */
$(document).ready(function () {
    $('header').removeClass('navmenu-active');
});
$(document).ready(function () {
    $('.navbar-toggle').on('click',function(){
        $('header').toggleClass('navmenu-active');
    });
});
$(document).ready(function () {
    $('.navbar-collapse ul li a').on('click', function () {
        $('header').removeClass('navmenu-active');
    })
});
$(document).ready(function () {
    $(document).ready(function(){
        $(".alert-flash").delay(4000).slideUp(300);
    });
});
$(window).scroll(function() {
    $('.counter').each(function() {
        let pos = $(this).offset().top;
        let winTop = $(window).scrollTop();
        let $this = $(this),countTo = $this.attr('data-count');
        if (pos <= winTop + 600) {
            $({ countNum: $this.text()}).animate({
                    countNum: countTo },
                {
                    duration: 1000,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                        },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
        }

    });
});
$(document).ready(function () {
    $('.submit-btn').on('click', function () {
        let target = $(this).attr('data-target');
        let spin = $(this).attr('data-spin');
        $(this).attr('disabled','disabled');
        $('#'+spin).addClass('spin');
        $('#'+target).submit()
    })
});



