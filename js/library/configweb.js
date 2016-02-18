/* 
 * Create By Kimniyom
 * Date 2015-01-09
 */

$(document).ready(function () {
    var width = $(window).width();
    if (width < 1024) {
        $(".breadcrumb").hide();
        $("#head_submenu").css("font-size", "18px");
    } else {
        $(".breadcrumb").show();
        $("#head_submenu").css("font-size", "30px");
    }

    $(window).resize(function () {
        var width = $(window).width();
        if (width < 1024) {
            $(".breadcrumb").hide();
            $("#head_submenu").css("font-size", "18px");
        } else {
            $(".breadcrumb").show();
            $("#head_submenu").css("font-size", "30px");
        }
    });
});
