$(document).scroll((e) => {
    // How much the user has scrolled
    let height = window.scrollY + 0.3*(window.scrollY);

    if(height > 1620)
        height = 1620;

    // Update width and height
    $("#mov-v").css("height", height + "px");   
    shadePointerAndContainer(height);
});

var interact = [0, 50, 500, 700, 900, 950, 1100, 1150, 1300, 1335, 1420, 1450, 1600, 1630];

function shadePointerAndContainer(height) {
    $(".pointer").removeClass("active");
    $(".container").removeClass("active");

    for(var i = 0; i < 13; i++) {
        if(height < interact[i+2] && height > interact[i+1] ) {
            $(".pointer").eq(i).addClass("active");
            $(".container").eq(i).addClass("active");

            if($(".d-cont").eq(i).hasClass("animate") == false) {
                $(".d-cont").eq(i).addClass("animate");
            }
            break;
        } 
    }
}

