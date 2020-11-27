  $('#quick-view-product').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var sampledata = button.data('title');
    var price = button.data('price');
    var img = button.data('img');
    var descr = button.data('descr');
    var pro_id = button.data('proid');

    var modal = $(this);
    modal.find('.title_pro').text(sampledata);
    modal.find('.price').text(price);
    modal.find('.img-responsive').attr('src',img);
    modal.find('.pro_descr').html(descr);
    modal.find('.pro_id').attr('value', pro_id);
  });
  $('#confirm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var cus_id = button.data('id');
    
    var modal = $(this);
    modal.find('.id').attr('value', cus_id);
  });