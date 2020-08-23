(function($){
	tinymce.init({
	    selector: '.tinymce-textarea'
	})

	$('.check_all').click(function(){
		if($(this).prop('checked'))
			$(this).closest('.table').find('.table_checkbox').each(function(){
				$(this).prop('checked',true);
			})
		else
			$(this).closest('.table').find('.table_checkbox').each(function(){
				$(this).prop('checked',false);
			})
	})

	$('.table_checkbox').click(function(){
		var check_all = true
		$('.table_checkbox').each(function(){
			if(!$(this).prop('checked')){
				check_all = false
			}
		})
		$(this).closest('.table').find('.check_all').prop('checked',check_all);
	})

	$('.delete').click(function(e){
		e.preventDefault
		if(confirm("Do you want to delete this item?")){
			return true
		}else{
			return false;
		}
	})

	$('input[type=file]').change(function(){
	  var filename = $(this).val().split('\\').pop();
	  var idname = $(this).attr('id');
	  $('[for='+idname+']').text(filename);
	})

})(jQuery)