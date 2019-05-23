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


  $("#navopen").click(function(){
    $(".shopnav").toggleClass("shopnavopened");
    $("#navopen").toggleClass("openednavbtn");
  });

  $("#btnchangefirstname, #btnchangename").click(function(){
    $("#submitchangesbtn").show();
  });

  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });

  $('#newitem').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    if (bookId != undefined) {
      $(e.currentTarget).find('input[name="categoryid"]').val(bookId);
    }
  });

  $('.btntoggleaboutustextchange').on('click', function () {
    $("#changeaboutustext").toggle();
    $("#aboutustext").toggle();
});

});

function reshowmodal(){
  $( document ).ready(function() {
    if (document.querySelector('.createshoperror') !== null) {
      $('#exampleModal').modal('show');
    }
    if (document.querySelector('.additemerror') !== null) {
      $('#newitem').modal('show');
    }
    if (document.querySelector('.addcategoryerror') !== null) {
      $('#newcat').modal('show');
    }
  });
}
