$(function()
{
	$('.tombolTambahData').on('click', function() {
		$('#judulModal').html('Tambah Data Menu');
		$('.modal-footer button[type=submit]').html('Tambah Data');
	});


	$('.TombolEdit').on('click', function() {
 		
		$('#judulModal').html('Ubah Data Menu');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		$('.modal-body form').attr('action','http://localhost/wpu-login/menu/ubah');

		const id = $(this).data('id');
		$.ajax({
			url: 'http://localhost/wpu-login/menu/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#menu').val(data.menu);
				$('#id').val(data.id);
			}
		});

	});
});