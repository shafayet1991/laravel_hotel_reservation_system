document.addEventListener('DOMContentLoaded', function() {

	$(document).ready(function() {

		$('[multi-select="true"]').on('click', function() {

			const multi_select_id = $(this).attr('multi-select-id');
			const multi_select_move_id = $(this).attr('multi-select-move-id');
			const multi_select_type = $(this).attr('multi-select-type');
			const multi_select_value = $(this).val();

			$('select[multi-select-id="'+multi_select_id+'"] > option').each(function() {
				if ($(this).val() == multi_select_value) {

					const multi_select_name = $(this).attr('multi-select-name');

					setTimeout(function() {
						$('select[multi-select-id="'+multi_select_id+'"] > option').each(function() {
							if ($(this).val() == multi_select_value) {
								$(this).remove();
							}
						});
					}, 100);

					setTimeout(function() {
						if (multi_select_type == "right") {
							if (multi_select_value != "") {
								$('select[multi-select-id="'+multi_select_move_id+'"]').append('<option value="'+multi_select_value+'" multi-select-name="'+multi_select_name+'" selected>'+multi_select_name+'</option>');
							}
						}
						if (multi_select_type == "left") {

							const multi_select_data_length = multi_select_value.length;

							if (multi_select_data_length == 1) {
								if (multi_select_value != "") {
									$('select[multi-select-id="'+multi_select_move_id+'"]').append('<option value="'+multi_select_value+'" multi-select-name="'+multi_select_name+'">'+multi_select_name+'</option>');

									$('select[multi-select-id="'+multi_select_id+'"] > option').each(function() {
										if ($(this).attr('checked') != true) {
											const multi_select_data = $(this).val();
											const multi_select_name_second = $('select[multi-select-id="'+multi_select_id+'"] > option[value="'+multi_select_data+'"]').attr('multi-select-name');
											$('select[multi-select-id="'+multi_select_id+'"]').append('<option value="'+multi_select_data+'" multi-select-name="'+multi_select_name_second+'" selected>'+multi_select_name_second+'</option>');
											$(this).remove();
										}
									});
								}
							}
						}
					}, 150);

				}
			});

		});

	});

}, false);