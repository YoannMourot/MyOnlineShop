$( document ).ready(function() {
  $("#togglebtn").click(function(){
    $(".mySidenav").toggleClass("openedSidenav");
    $(".ppcontainer").toggleClass("Openedppcontainer");
    $(".Navitems").toggleClass("OpenedNavitems");
    $(".Username").toggleClass("openedUsername");
    $(".disconnect").toggleClass("openedDisconnect");
  });
});
