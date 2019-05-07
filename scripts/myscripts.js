$( document ).ready(function() {
  $("#togglebtn").click(function(){
    $(".mySidenav").toggleClass("openedSidenav");
    $(".ppcontainer").toggleClass("Openedppcontainer");
    $(".Navitems").toggleClass("OpenedNavitems");
    $(".Username").toggleClass("openedUsername");
    $(".ppcontainer img").toggleClass("Openedppcontainer img");
    $(".disconnect").toggleClass("openedDisconnect");
  });
});
