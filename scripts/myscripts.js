$( document ).ready(function() {

  $( ".emptyboutique" ).focus();

  $("#togglebtn").click(function(){
    $(".mySidenav").toggleClass("openedSidenav");
    $(".ppcontainer").toggleClass("Openedppcontainer");
    $(".Navitems").toggleClass("OpenedNavitems");
    $(".Username").toggleClass("openedUsername");
    $(".ppcontainer img").toggleClass("Openedppcontainer img");
    $(".disconnect").toggleClass("openedDisconnect");
  });

  $("#btnchangefirstname, #btnchangename").click(function(){
    $("#submitchangesbtn").show();
  });

  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
});

function reshowmodal(){
  $( document ).ready(function() {
    if (document.querySelector('.errormsg') !== null) {
      $('#exampleModal').modal('show');
    }
  });
}
