require(["jquery"], function ($) {

    $(".page-header").click(function (event) {
        //  color = event.current.targetvalue.background;
        var color = $(this).css('background-color');
        console.log(color);
        if (color == "rgb(255, 255, 0)") {
            color = "blue";
            alert('Color will change 1');
            $(".page-header").css("background-color", color);

        } else if (color != "rgb(255, 255, 0)") {
            color = "yellow";
            alert('Color will change 2');
            $(".page-header").css("background-color", color);
        }
    });


})