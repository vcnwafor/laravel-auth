<script type="text/javascript">

	// CONFIRMATION DELETE MODAL
    var fileurl = '';
	$('#confirmDownload').on('show.bs.modal', function (e) {
		var message = $(e.relatedTarget).attr('data-message');
		var title = $(e.relatedTarget).attr('data-title');
         fileurl = $(e.relatedTarget).attr('data-fileurl');
		var form = $(e.relatedTarget).closest('form');
		$(this).find('.modal-body p').text(message);
		$(this).find('.modal-title').text(title);
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#confirmDownload').find('.modal-footer #confirm').on('click', function(){
          window.open(window.location.protocol+"//"+window.location.host+"/"+fileurl,'_blank');
	});

</script>
