  $('#supprimer_produit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pro_title = button.data('pro_title');
    var pro_id = button.data('pro_id');
    
    var modal = $(this);
    modal.find('.pro_title').text(pro_title);
    modal.find('.pro_id').attr('value', pro_id);
  });
  $('#supprimer_categorie').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var cat_descr = button.data('cat_descr');
    var cat_id = button.data('cat_id');
    
    var modal = $(this);
    modal.find('.cat_descr').text(cat_descr);
    modal.find('.cat_id').attr('value', cat_id);
  });
  $('#supprimer_client').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var cus_mail = button.data('cus_mail');
    var cus_id = button.data('cus_id');
    
    var modal = $(this);
    modal.find('.cus_mail').text(cus_mail);
    modal.find('.cus_id').attr('value', cus_id);
  });
  $('#supprimer_commande').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var ord_id = button.data('ord_id');
    
    var modal = $(this);
    modal.find('.ord_id_display').text(ord_id);
    modal.find('.ord_id').attr('value', ord_id);
  });
  $('#supprimer_livraison_mode').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var typ_log_descr = button.data('typ_log_descr');
    var typ_log_id = button.data('typ_log_id');
    
    var modal = $(this);
    modal.find('.typ_log_descr').text(typ_log_descr);
    modal.find('.typ_log_id').attr('value', typ_log_id);
  });
  $('#supprimer_paiement_mode').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var typ_pay_descr = button.data('typ_pay_descr');
    var typ_pay_id = button.data('typ_pay_id');
    
    var modal = $(this);
    modal.find('.typ_pay_descr').text(typ_pay_descr);
    modal.find('.typ_pay_id').attr('value', typ_pay_id);
  });