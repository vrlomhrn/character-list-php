$(function () {
  $('.addButton').on('click', function () {
    $('#formModalLabel').html('Insert Data Character');
    $('.modal-footer button[type=submit]').html('Add');
    $("#name").val("");
    $("#nickname").val("");
    $("#anime").val("");
    $("#manga").val("");
    $("#seiyuu").val("");
    $("#description").val("");
  });

  $('.displayEditModal').on('click', function () {
    $('#formModalLabel').html('Edit Data Character');
    $('.modal-footer button[type=submit]').html('Done');
    $(".modal-body form").attr("action", "http://localhost/phpmvc/public/characters/edit");

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/phpmvc/public/characters/getEdit',
      data: { id: id},
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $("#name").val(data.name);
        $("#nickname").val(data.nickname);
        $("#anime").val(data.anime);
        $("#manga").val(data.manga);
        $("#seiyuu").val(data.seiyuu);
        $("#description").val(data.description);
        $("#id").val(data.id);
      },
    });
  });
});
