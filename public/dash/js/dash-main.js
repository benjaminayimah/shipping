$(document).ready(function () {
    $(document).ready(function(){
        $(".alert-flash").delay(3000).slideUp(300);
    });
});

$(document).ready(function () {
    $('.del-opt').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this item?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.edit-opt').click(function () {
        $('#myEditopt_modal').modal();
        let content = $(this).attr('data-content');
        $('#EditModalLabel').html('Edit '+content);
        let id = $(this).attr('data-id');
        $('#opt_input').html('<input type="text" data-id="'+id+'" class="form-control" value="'+content+'" id="editOption">');
    });
    $('#editOptBtn').click(function () {
        let thisurl = window.location.pathname;
        let target = $('#editOption');
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: EditOpt,
            data: {
                input: target.val(),
                optID: target.attr('data-id'),
                _token: token
            },
            success: function (data) {
                window.location = thisurl;
            },
            error: function (data) {
                console.log(data.statusText)
            }
        })
    });
});
$(document).ready(function () {
    $('.add-opt-btn').on('click', function () {
        let title = $(this).attr('data-title');
        let id = $(this).attr('data-id');
       $('#myAddModal').modal();
       $('#addModaltitle').html(title);
       $('#addHiddenInput').val(id);
    })
});
/* sidenav-toggles */
$(document).ready(function () {
    $('body').removeClass('sidebar-unpinned');
});
$(document).ready(function () {
    $('.sidebar-toggle').on('click',function(){
        $('body').toggleClass('sidebar-unpinned');
    });
});
$(document).ready(function () {
    $('#sidenav-main').on('mouseenter', function () {
        $(this).addClass('sidenav-collapse')
    });
    $('#sidenav-main').on('mouseleave', function () {
        $(this).removeClass('sidenav-collapse')
    })
});



$(document).ready(function () {
   $('#draft_btn').on('click', function () {
       $('#status').val('0');
       $('#shipment_form').submit();
   })
});
$(document).ready(function () {
    $('#publish_btn').on('click', function () {
        $('#status').val('1');
        $('#shipment_form').submit();
    })
});
$(document).ready(function () {
    $('#generateIDbtn').on('click', function () {
        let len = 10;
        let charset = "0123456789";
        let text = '';
        for( let i = 0; i<len; i++){
            text  += charset.charAt(Math.floor(Math.random()*charset.length));
        }
        $('#trackingID_hold').html(text);
        $('#trackingIDinput').val(text);
        $('#track_info').html('<small class="text-success"><i class="zmdi zmdi-check"></i> Tracking ID successfully generated, please proceed.</small>')
    })
});
$(document).ready(function () {
    $('.ship-del-btn').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this item?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.feed-del-btn').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this message?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.del-quote').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this message?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('#feedback tbody tr').on('click', function () {
        $('#feedback_main_body').removeClass('showthis');
        $('.fetch-spin').addClass('showthis');
        setTimeout(function() {
            $('.fetch-spin').removeClass('showthis');
            $('#feedback_main_body').addClass('showthis');
            }, 1000);
        let name = $('#'+$(this).attr('data-name')).html();
        let email = $('#'+$(this).attr('data-email')).html();
        let message = $('#'+$(this).attr('data-body')).html();
        let date = $('#'+$(this).attr('data-date')).html();
        let company = $('#'+$(this).attr('data-company')).html();
        let city1 = $('#'+$(this).attr('data-city1')).html();
        let city2 = $('#'+$(this).attr('data-city2')).html();
        let weight = $('#'+$(this).attr('data-weight')).html();
        let dimension = $('#'+$(this).attr('data-dimension')).html();
        let shipMode = $('#'+$(this).attr('data-shipMode')).html();
        let info = $('#'+$(this).attr('data-info')).html();
        let id = $(this).attr('data-id');
        $('#feedback_name').html(name);
        $('#feedback_email').html(email);
        $('#feedback_body').html(message);
        $('#feedback_date').html(date);
        $('#quote_company').html(company);
        $('#quote_city1').html(city1);
        $('#quote_city2').html(city2);
        $('#quote_weight').html(weight);
        $('#quote_dimensions').html(dimension);
        $('#quote_shippingmode').html(shipMode);
        $('#quote_info').html(info);
        $('#feed_reply_trigger').attr('data-id', id);
    })
});
$(document).ready(function () {
    $('.del-img').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this item?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.edit-gal').click(function () {
        let titleVal = $('#titleEdit').val('');
        let sub1Val = $('#subTitle1Edit').val('');
        let sub2Val = $('#subTitle2Edit').val('');
        let sub3Val = $('#subTitle3Edit').val('');
        let idVal = $('#inputEditId').val('');
        let img = $('#imgGalOld').val('');
        $('#myEditGal_modal').modal();
        let id = $(this).attr('data-id');
        let title = $(this).attr('data-title');
        let sub1 = $(this).attr('data-sub1');
        let sub2 = $(this).attr('data-sub2');
        let sub3 = $(this).attr('data-sub3');
        let imgOld = $(this).attr('data-image');
        let status = $(this).attr('data-status');
        titleVal.val(title);
        sub1Val.val(sub1);
        sub2Val.val(sub2);
        sub3Val.val(sub3);
        idVal.val(id);
        img.val(imgOld);
        if (status == '1'){
            document.getElementById('featured').checked = true;
        }
    });
    $('#editOptBtn').click(function () {
        let thisurl = window.location.pathname;
        let target = $('#editOption');
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: EditOpt,
            data: {
                input: target.val(),
                optID: target.attr('data-id'),
                _token: token
            },
            success: function (data) {
                window.location = thisurl;
            },
            error: function (data) {
                console.log(data.statusText)
            }
        })
    });
    $('.edit-banner').click(function () {
        let caption1Val = $('#caption1Edit').val('');
        let caption2Val = $('#caption2Edit').val('');
        let btn = $('#ButtonEdit').val('');
        let target = $('#target').val('');
        let idVal = $('#inputEditId').val('');
        let img = $('#imgOld').val('');
        $('#myEditBanner_modal').modal();
        let id = $(this).attr('data-id');
        let title = $(this).attr('data-title');
        let sub1 = $(this).attr('data-sub1');
        let sub2 = $(this).attr('data-sub2');
        let sub3 = $(this).attr('data-sub3');
        let imgOld = $(this).attr('data-image');
        let status = $(this).attr('data-status');
        caption1Val.val(title);
        caption2Val.val(sub1);
        btn.val(sub2);
        target.val(sub3);
        idVal.val(id);
        img.val(imgOld);
        if (status == '1'){
            document.getElementById('featured').checked = true;
        }
    });
});
$(document).ready(function () {
    $('.gal-status-toggle').on('input', function () {
        $(this).addClass('has-changed')
    });
    $('.gal-status-form').on('mouseleave', function () {
        var inputId = $(this).attr('data-target');
        if($('input[id="'+inputId+'"]').hasClass('has-changed')){
            $(this).submit();
        }
    });
})
$(document).ready(function () {
    $('.user-del-btn').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this user?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.sec-del-btn').on('click', function () {
        let target = $(this).attr('data-target');
        if (confirm('Are sure you want to delete this item?')) {
            $('#'+target).submit()
        }else {
            return false;
        }
    })
});
$(document).ready(function () {
    $('.update-sec').on('click', function () {
        let target = $(this).attr('data-target');
        $('#'+target).submit()
    })
});
