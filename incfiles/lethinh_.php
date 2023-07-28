<script language="javascript">


	

		$(document).ready(function(){
		$('.lethinh_quaonline').on('click','#lethinh_online',function(){

			$.ajax({
				url: '/ajax/lethinh_quaonline.php',
				type: 'POST',
				dataType: 'text',
				data: {
				  
					quaonline: ""
				},
				success: function(result){
					$('.lethinh_quaonline').html(result);
				}
			});
			return false;
		});
	});
		$(document).ready(function(){
		$('.lethinh_maunick').on('click','#lethinh_mua',function(){

			$.ajax({
				url: '/ajax/lethinh_maunick.php',
				type: 'POST',
				dataType: 'text',
				data: {
				  
					msg: ""
				},
				success: function(result){
					$('.lethinh_maunick').html(result);
				}
			});
			return false;
		});
	});
		$(document).ready(function(){
		$('.lethinh_quaupdate').on('click','#lethinh_update',function(){

			$.ajax({
				url: '/ajax/lethinh_quaupdate.php',
				type: 'POST',
				dataType: 'text',
				data: {
				  
					quaupdate: ""
				},
				success: function(result){
					$('.lethinh_quaupdate').html(result);
				}
			});
			return false;
		});
	});
	</script>