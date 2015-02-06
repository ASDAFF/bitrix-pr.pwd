jQuery(document).ready( function($){
	
	$('.pr_pwd form').submit(function() {
		var t_form 		= $(this);
		var t_parent 	= t_form.closest('.pr_pwd');
		$('.error', t_parent).remove();
		BX.ajax.loadJSON(
			'/bitrix/components/pr/pwd/script/ajax.php?'+t_form.serialize(),
			function (data) {
				if(data.status === false)
				{
					t_parent.prepend('<div class="error">' + data.result + '</div>');
				}
				if(data.status === true)
				{
					t_parent.html(data.result);
				}
			}
		);
		return false;
	});

});