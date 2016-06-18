$(function() {
if (screen.width > 768) {
    var $el, leftPos, newWidth,
        $mainNav = $("#main-nav");
    
    $mainNav.append("<li id='magic-line'><div class='triangle'></div></li>");
    var $magicLine = $("#magic-line");
    
    $magicLine
        //.width($(".current_page_item").width())
        .css("left", $(".current_page_item").position().left)
        .data("origLeft", $magicLine.position().left);
        //.data("origWidth", $magicLine.width());
        
    $("#main-nav li a").hover(function() {
        $el = $(this);
        leftPos = $el.parent().position().left;
        //newWidth = $el.width();
        //newWidth = "60px";
        $magicLine.stop().animate({
            left: leftPos,
            //width: newWidth
        });
        
    }, function() {
        $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            //width: $magicLine.data("origWidth")
        });    
    });
	// download complicated script
	// swap in full-source images for low-source ones
}
});