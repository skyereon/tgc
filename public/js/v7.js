window.delay_baseline = 1500;

$(document).ready(function() {
  
  $( "#section0" ).data({
  "id": "123",
    "title": "123.ie",
    "type":"Website",
    "description": "The redesign of one of Ireland's most successful insurance companies.",
  });
  
  $( "#section1" ).data({
  
    "id": "shelf",
    "title": "Shelf",
    "type":"iOS App, Web App & Brand",
    "description": "Selling your things is more difficult than it should be.<br/> Shelf is a mobile marketplace designed to make it easier.",
  });
  
  $( "#section2" ).data({
    "id": "viable",
    "title": "Viable Labs",
    "type":"Branding",
    "description": "The Swiss standard. Our sister company, Viable Labs, were in search of a unique personality and proposition that represented their signature quality and refined vision.",
  });
  
  $( "#section3" ).data({
    "id": "jetquote",
    "title": "JetQuote",
    "type":"Landing Page Redesign",
    "description": "We built an elegant set of landing pages for JetQuote. </br> JetQuote provides access to an  ad-hoc fixed-price booking of private jets.",
  });
  
  $( "#section4" ).data({
    "id": "popdeem",
    "title": "Popdeem",
    "type":"Application Redesign",
    "description": "Social matters. Our redesign of the Popdeem user interface saw the social reward platform target big brands and breed customer ambassadorship. ",
  });
  
  window.slideNav = function(num) {
    console.log(num);
    var obj = $( "#fp-nav ul" );
    console.log(obj);
    obj.css("top", num * -$('#fp-nav li').height() + "px");
  }
  
  window.animateDetails = function() {
    
    var delay = delay_baseline / 2;
    
    var objects = [
      { obj: $('#project-number'), in: "flipInX", out: "flipOutX" },
      { obj: $('#project-title'), in: "flipInX", out: "flipOutX" },
      { obj: $('#project-type'), in: "flipInX", out: "flipOutX" },
      { obj: $('#project-description'), in: "fadeInUp", out: "fadeOutUp" }
    ];
    
    $.each( objects, function() {
      
      var obj = this["obj"];
      var varin = this["in"];
      var varout = this["out"];
      
      $(obj).removeClass().addClass('animated ' + varout).delay(delay).queue(function(next){
        
        $(this)
          .removeClass()
          .addClass('animated ' + varin);
        next();
      });
    
    });
    
  };

  var navbarHeight = $('.navbar').height();
  
  $( ".navbar-spacer" ).css("height",navbarHeight);
  resizeAuthor();
  
  $( "#project-button" ).hover(
    function() {
      $( $( "#load" ) ).addClass( "active" );
    }, function() {
      $( $( "#load" ) ).removeClass();
    }
  );  
  
  
  $('#job-listings .job-listing a').click(function(e){
    e.preventDefault();
    var obj = $(this).parent();
    $(obj).toggleClass("active");
    $(obj.children(".description")).slideToggle("slow");
  });
  
  $('.navbar-toggle').click(function(){
    $('body').toggleClass('disable-scroll');
    $('main').toggleClass('blur');
    $('.navbar-wrapper').toggleClass('active');
    $('.navbar').toggleClass('hide');
  });
});

$( window ).load(function() {
  $(".v7-page, #page-contact, #page-projects-index, #page-blog").css("opacity","1");
});

$( window ).resize(function() {
  resizeAuthor();
});

function resizeAuthor() {
  var authorWidth = ($( document ).width() - $('#page-blog-article h2').width()) / 2;
  $( "#page-blog-article .author-wrapper" ).css("width",authorWidth);
}