(function($){
	$('#price_excl, #tax').on('change blur',function(){
		if($(this).val() != '')
			price_tax_calc()
	})

	$('#product_form').submit(function(){
			price_tax_calc()
	})

	$('[name="category"]').on("change", function(){
		var selected = $('[name="category"]:checked').val()
		$('[name="categories[]"]').each(function(){
			if($(this).val() === selected)
				$(this).prop("checked",true)
		})
	})

	$('[name="categories[]"]').on('click', function(){
		if($(this).prop('checked') == false || $('[name="category"]:checked').val() == undefined){
			var first_checked = $('[name="categories[]"]:checked:first').val()
			$('[name="category"]').each(function(){
				if($(this).val() == first_checked){
					$(this).prop('checked',true)
					return false
				}
			})
		}
	})

	$('#price_excl').focus(function(){
		if($(this).val()=="0.00"){
			$(this).val('')
		}
	})

	$('[name="name"]').on('blur', function(){
		var slug = $('[name="slug"]')
		alert
		if(slug.val()==''){
			value = $(this).val().toLowerCase().replace(/[^a-z0-9 -]/gmi,'').trim().replace(/ /g,'-')
			slug.val(value)
		}
	})

	price_tax_calc()
})(jQuery)

function price_tax_calc(price){
	var price = Math.round($('#price_excl').val())
	var price_incl = Math.round(price * (1 + (tax[$('#tax').val()]/100)) * 100 )/ 100
	
	$('#price_excl').val(price.toFixed(2))
	$('#price_incl').val(price_incl.toFixed(2))
	$('#final-price-incl').text(price_incl.toFixed(2))
	$('#final-price-excl').text(price.toFixed(2))
}