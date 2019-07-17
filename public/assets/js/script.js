document.addEventListener('DOMContentLoaded', function() {

    $(document).ready(function() {

        $('#plusButton').on('click', function (e) {
            e.preventDefault();
            let childQtyValue = parseInt($('#quantityChild').val());
            if (childQtyValue !== 2) {
                let quantityChild = parseInt($('#quantityChild').val()) + 1;
                $('#quantityChild').val(quantityChild);
            }
        });
        $('#minusButton').on('click', function (e) {
            e.preventDefault();
            let childQtyValue = parseInt($('#quantityChild').val());
            if (childQtyValue !== 0) {
                let quantityChild = parseInt($('#quantityChild').val()) - 1;
                $('#quantityChild').val(quantityChild);
            }
        });
        $('#select-gear').selectize({
            sortField: 'text',
            onChange(value) {
                value <= 81 ? $('#selectionType').val("1") : $('#selectionType').val("2");
            }
        });

        $("#form-report").submit(function(form){
            var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
            $.ajax({
                type: 'POST',
                url: "{{ url('/reservation_payment_report') }}",
                data: formdata, // here $(this) refers to the ajax object not form
                success: function (data) {
                    alert("Bildirim Gönderildi.");
                    $('#reservation_payment_report').modal('hide');
                },
            });
            form.preventDefault();
        });

        $('[data-toggle="popover"]').popover();

        $('button[night-day-button="true"]').on('click', function() {

            var night_date_get_id = $(this).attr('night-date-get-id');
            var night_date_set_id = $(this).attr('night-date-set-id');
            var night_selectbox_status = $(this).attr('night-selectbox-active');
            var night_selectbox_id = $(this).attr('night-selectbox-id');
            var night_day = $(this).attr('night-day');
            var date_get = $('input[night-date-get-id="'+night_date_get_id+'"]').val();

            if (night_selectbox_status == "true") {
                $('select[night-selectbox-id="'+night_selectbox_id+'"]').removeClass('d-none');
            } else {
                $('select[night-selectbox-id="'+night_selectbox_id+'"]').addClass('d-none');
            }

            // Date day
            var ddf = date_get[0];
            var dds = date_get[1];

            // Date mounth
            var dmf = date_get[3];
            var dms = date_get[4];

            // Date year
            var dyf = date_get[6];
            var dys = date_get[7];
            var dyt = date_get[8];
            var dyfo = date_get[9];

            var get_date = dyf+dys+dyt+dyfo+"."+dmf+dms+"."+ddf+dds;

            var new_date = new Date(get_date);
            new_date.setDate(new_date.getDate() + Number(night_day));
            var date_calculate = new_date.toLocaleDateString();

            $('input[night-date-set-id="'+night_date_set_id+'"]').val(date_calculate);

            $('[night-day-button="true"]').addClass('ss-btn-active');
            $('[night-day-button="true"]').attr('night-day-select', 'false');
            $(this).removeClass('ss-btn-active');
            $(this).attr('night-day-select', 'true');

        });

        $('[night-selectbox="true"]').on('change', function() {

            var day_number = $(this).val();
            var night_date_get_id = $(this).attr('night-date-get-id');
            var night_date_set_id = $(this).attr('night-date-set-id');
            var date_get = $('input[night-date-get-id="'+night_date_get_id+'"]').val();

            // Date day
            var ddf = date_get[0];
            var dds = date_get[1];

            // Date mounth
            var dmf = date_get[3];
            var dms = date_get[4];

            // Date year
            var dyf = date_get[6];
            var dys = date_get[7];
            var dyt = date_get[8];
            var dyfo = date_get[9];

            var get_date = dyf+dys+dyt+dyfo+"."+dmf+dms+"."+ddf+dds;

            var new_date = new Date(get_date);
            new_date.setDate(new_date.getDate() + Number(day_number));
            var date_calculate = new_date.toLocaleDateString();

            $('input[night-date-set-id="'+night_date_set_id+'"]').val(date_calculate);

        });

        $('#datepicker-1').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Pzr",
                    "Pzt",
                    "Slı",
                    "Çar",
                    "Per",
                    "Cum",
                    "Cmt"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
        });

        $('#datepicker-2').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Pzr",
                    "Pzt",
                    "Slı",
                    "Çar",
                    "Per",
                    "Cum",
                    "Cmt"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
        });

        $('#datepicker-8').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: new Date(),
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Pzr",
                    "Pzt",
                    "Slı",
                    "Çar",
                    "Per",
                    "Cum",
                    "Cmt"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
        });

        $('#datepicker-9').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: new Date(),
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Pzr",
                    "Pzt",
                    "Slı",
                    "Çar",
                    "Per",
                    "Cum",
                    "Cmt"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
        });

        $('#datepicker-8').on('change',function(){
            var selected = $(this).val();

            var day1 = selected[0];
            var day2 = selected[1];

            var mounth1 = selected[3];
            var mounth2 = selected[4];

            var year1 = selected[6];
            var year2 = selected[7];
            var year3 = selected[8];
            var year4 = selected[9];

            var day = day1+day2+'/'+mounth1+mounth2+'/'+year1+year2+year3+year4;

            $('#datepicker-9').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minDate: day,
                locale: {
                    "format": "DD.MM.YYYY",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Pzr",
                        "Pzt",
                        "Slı",
                        "Çar",
                        "Per",
                        "Cum",
                        "Cmt"
                    ],
                    "monthNames": [
                        "Ocak",
                        "Şubat",
                        "Mart",
                        "Nisan",
                        "Mayıs",
                        "Haziran",
                        "Temmuz",
                        "Ağustos",
                        "Eylül",
                        "Ekim",
                        "Kasım",
                        "Aralık"
                    ],
                    "firstDay": 1
                },
            }, function(start, end, label) {
                var years = moment().diff(start, 'years');
            });

            $('#datepicker-9').trigger('click');

        });

        $('#datepicker-9').on('change', function() {

            var selected_days = $(this).val();
            var login_date_day = $('#datepicker-8').val();

            var d1 = login_date_day[0];
            var d2 = login_date_day[1];
            var m1 = login_date_day[3];
            var m2 = login_date_day[4];
            var y1 = login_date_day[6];
            var y2 = login_date_day[7];
            var y3 = login_date_day[8];
            var y4 = login_date_day[9];
            var login_date_change = m1+m2+"/"+d1+d2+"/"+y1+y2+y3+y4;

            var d11 = selected_days[0];
            var d22 = selected_days[1];
            var m11 = selected_days[3];
            var m22 = selected_days[4];
            var y11 = selected_days[6];
            var y22 = selected_days[7];
            var y33 = selected_days[8];
            var y44 = selected_days[9];
            var exit_date_change = m11+m22+"/"+d11+d22+"/"+y11+y22+y33+y44;

            function dateDayDifferenceCalculator (first_date, second_date) {
                var date1 = new Date(first_date);
                var date2 = new Date(second_date);
                var difference = Math.abs(date1.getTime() - date2.getTime());
                return Math.round(difference/86400000);
            }

            var difference_day = dateDayDifferenceCalculator(login_date_change, exit_date_change);

            if (difference_day >= 4) {
                $('[night-day-button="true"]').addClass('ss-btn-active');
                $('[night-day-button="true"][night-day="'+difference_day+'"]').removeClass('ss-btn-active');
                $('[night-selectbox="true"]').removeClass('d-none');
                $('[night-selectbox="true"]').val(difference_day).trigger('click');
            } else {
                $('[night-day-button="true"]').addClass('ss-btn-active');
                $('[night-day-button="true"][night-day="'+difference_day+'"]').removeClass('ss-btn-active');
                $('[night-selectbox="true"]').addClass('d-none');
            }

        });

        $('[data-search-form-view="true"]').on('click', function() {

            var data_search_form_id = $(this).attr('data-search-form-id');
            //var window_width = $('body').width();

            $('[data-search-form="'+data_search_form_id+'"]').removeClass('d-none');
            $(this).attr('data-search-form-status', 'open');

            /*if (window_width < 575) {
                $('.place-search-card-mobile[data-search-form="'+data_search_form_id+'"]').removeClass('d-none');
                $(this).attr('data-search-form-status', 'open');
            } else {
                $('.place-search-card[data-search-form="'+data_search_form_id+'"]').removeClass('d-none');
                $(this).attr('data-search-form-status', 'open');
            }*/

        });

        $('#search_hotel').on('keyup', function() {

            var value_length = $(this).val().length;

            if (value_length > 0) {
                $('#shortuct').addClass('d-none');
                $('#result').removeClass('d-none');
            } else {
                $('#result').addClass('d-none');
                $('#shortuct').removeClass('d-none');
            }

            var value = $(this).val().toLowerCase();

            $("#result h5").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('[data-search-form-close="true"]').on('click', function() {

            $('[data-search-form="1"]').addClass('d-none');
            $('[data-search-form-id="1"]').attr('data-search-form-status', 'close');

        });

        $('[data-search-form-data="true"]').on('click', function() {

            var data_search_form_name = $(this).attr('data-search-form-name');
            var data_search_form_id = $(this).attr('data-search-form-id');
            var data_search_form_type = $(this).attr('data-search-form-type');

            $('[data-search-form-id="1"]').val(data_search_form_name);
            $('#selectionId').val(data_search_form_id);
            $('#selectionType').val(data_search_form_type);
            $('[data-search-form="1"]').addClass('d-none');
            $('[data-search-form-id="1"]').attr('data-search-form-status', 'close');

        });


        $('[dropdown-target="yes"]').on('click', function () {

            var dropdown_id = $(this).attr('dropdown-target-id');
            var dropdown_button_status = $(this).attr('aria-expanded');

            if (dropdown_button_status == "false") {
                $('.dropdown-menu[dropdown-id="' + dropdown_id + '"]').addClass('d-block');
            } else {
                $('.dropdown-menu[dropdown-id="' + dropdown_id + '"]').removeClass('d-block');
            }
        });

        $('[data-visible="true"]').on('click', function () {

            var data_visible_input_id = $(this).attr('data-visible-input-id');
            var data_visible_type = $(this).attr('data-visible-type');
            var data_input = $('input[data-visible-input-id="' + data_visible_input_id + '"]').val();
            var data_input_other_id = Number(data_input) + Number(1);

            if (data_visible_type == "up") {
                $('[data-visibled-id="' + data_input + '"]').removeClass('d-none');
            }

            if (data_visible_type == "down") {
                $('[data-visibled-id="' + data_input_other_id + '"]').addClass('d-none');
            }

        });

        $('[person-change="button"]').on('click', function() {

            var person_change_write_id = $(this).attr('person-change-write-id');
            var person_change_min_value = $(this).attr('person-change-min-value');
            var person_change_max_value = $(this).attr('person-change-max-value');
            var person_change_value_id = $(this).attr('person-change-value-id');
            var person_change_type = $(this).attr('person-change-type');
            var person_disabled_button = $(this).attr('person-disabled-button');
            var person_disabled = $(this).attr('person-disabled');

            var person_change_write_value = $('[person-change-write="' + person_change_write_id + '"]').val();
            var person_change_max = $('[person-change-write="' + person_change_write_id + '"]').attr('person-change-max');
            var person_change_min = $('[person-change-write="' + person_change_write_id + '"]').attr('person-change-min');

            var person_change_value = $('[person-change-value="' + person_change_value_id + '"]').val();

            if (person_change_type == "up") {
                var person_change_up_calculate = Number(person_change_write_value) + Number(1);
                if (person_change_min_value != person_change_value) {
                    if (person_change_write_value > person_change_max) {
                        if (person_change_max_value > person_change_max) {
                            if (person_change_max_value > person_change_value) {
                                $('[person-change-write="' + person_change_write_id + '"]').val(person_change_up_calculate);
                                $('[person-change="button"][person-disabled-button="' + person_disabled + '"]').prop("disabled", false);
                            } else {
                                $('[person-change-write="' + person_change_write_id + '"]').val(person_change_up_calculate);
                                $(this).prop("disabled", true);
                            }
                        }
                    } else {
                        $('[person-change-write="' + person_change_write_id + '"]').val(person_change_up_calculate);
                        $('[person-change="button"][person-disabled-button="' + person_disabled + '"]').prop("disabled", false);
                    }
                } else {
                    $('[person-change-write="' + person_change_write_id + '"]').val(person_change_up_calculate);
                    $(this).prop("disabled", true);
                }
            }

            if (person_change_type == "down") {
                var person_change_down_calculate = Number(person_change_write_value) - Number(1);
                if (person_change_min_value != person_change_value) {
                    if (person_change_write_value >= person_change_max) {
                        $('[person-change-write="' + person_change_write_id + '"]').val(person_change_down_calculate);
                        $('[person-change="button"][person-disabled-button="' + person_disabled + '"]').prop("disabled", false);
                    } else {
                        $('[person-change-write="' + person_change_write_id + '"]').val(person_change_down_calculate);
                        $(this).prop("disabled", true);
                    }
                } else {
                    $('[person-change-write="' + person_change_write_id + '"]').val(person_change_down_calculate);
                    $(this).prop("disabled", true);
                }
            }

        });

        $('[rating-stars="true"]').on('mouseover', function () {
            
            var rating_starts_group_id = $(this).attr('rating-stars-group-id');
            var rating_star_id = $(this).attr('rating-star-id');

            for (var i = 0; i < rating_star_id; i++) {
                $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="'+i+'"]').addClass('rating-star-active');
            }
            
        }).on('mouseout', function () {

            var rating_starts_group_id = $(this).attr('rating-stars-group-id');
            var rating_star_id = $(this).attr('rating-star-id');
            var rating_checked = $(this).attr('rating-checked');

            if (rating_checked == "false") {
                setTimeout(function () {
                    for (var i = 0; i < rating_star_id; i++) {
                        $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="' + i + '"]').removeClass('rating-star-active');
                    }
                }, 1500);
            } else {
                for (var i = 0; i < rating_star_id; i++) {
                    $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="' + i + '"]').addClass('rating-star-active');
                }
            }

        });

        $('[rating-stars="true"]').on('click', function () {

            var rating_starts_group_id = $(this).attr('rating-stars-group-id');
            var rating_star_id = $(this).attr('rating-star-id');

            for (var i = 0; i < rating_star_id; i++) {
                $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="'+i+'"]').attr('rating-checked', 'true');
                $('[rating-stars-group-id="'+rating_starts_group_id+'"]').removeClass('rating-star-active');
                $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="'+i+'"]').addClass('rating-star-active');
            }

            $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="'+rating_star_id+'"]').attr('rating-checked', 'true');
            $('[rating-stars-group-id="'+rating_starts_group_id+'"][rating-star-id="'+rating_star_id+'"]').addClass('rating-star-active');

        });

        $('[bank-card-input="true"]').on('keyup', function () {

            var bank_card_write_element_value = $(this).attr('bank-card-write-element-value');
            var bank_card_write_type = $(this).attr('bank-card-write-type');
            var bank_card_write_value = $(this).val();

            if (bank_card_write_type == "card-number") {

                var card_number_array = [];

                if (bank_card_write_value.length == 4) {
                    var cn0 = bank_card_write_value[0];
                    var cn1 = bank_card_write_value[1];
                    var cn2 = bank_card_write_value[2];
                    var cn3 = bank_card_write_value[3];
                    card_number_array.push(cn0+cn1+cn2+cn3);
                }

                if (bank_card_write_value.length == 8) {
                    var cn0 = bank_card_write_value[0];
                    var cn1 = bank_card_write_value[1];
                    var cn2 = bank_card_write_value[2];
                    var cn3 = bank_card_write_value[3];
                    var cn4 = bank_card_write_value[4];
                    var cn5 = bank_card_write_value[5];
                    var cn6 = bank_card_write_value[6];
                    var cn7 = bank_card_write_value[7];
                    card_number_array.push(cn0+cn1+cn2+cn3);
                    card_number_array.push(cn4+cn5+cn6+cn7);
                }

                if (bank_card_write_value.length == 12) {
                    var cn0 = bank_card_write_value[0];
                    var cn1 = bank_card_write_value[1];
                    var cn2 = bank_card_write_value[2];
                    var cn3 = bank_card_write_value[3];
                    var cn4 = bank_card_write_value[4];
                    var cn5 = bank_card_write_value[5];
                    var cn6 = bank_card_write_value[6];
                    var cn7 = bank_card_write_value[7];
                    var cn8 = bank_card_write_value[8];
                    var cn9 = bank_card_write_value[9];
                    var cn10 = bank_card_write_value[10];
                    var cn11 = bank_card_write_value[11];
                    card_number_array.push(cn0+cn1+cn2+cn3);
                    card_number_array.push(cn4+cn5+cn6+cn7);
                    card_number_array.push(cn8+cn9+cn10+cn11);
                }

                if (bank_card_write_value.length == 16) {
                    var cn0 = bank_card_write_value[0];
                    var cn1 = bank_card_write_value[1];
                    var cn2 = bank_card_write_value[2];
                    var cn3 = bank_card_write_value[3];
                    var cn4 = bank_card_write_value[4];
                    var cn5 = bank_card_write_value[5];
                    var cn6 = bank_card_write_value[6];
                    var cn7 = bank_card_write_value[7];
                    var cn8 = bank_card_write_value[8];
                    var cn9 = bank_card_write_value[9];
                    var cn10 = bank_card_write_value[10];
                    var cn11 = bank_card_write_value[11];
                    var cn12 = bank_card_write_value[12];
                    var cn13 = bank_card_write_value[13];
                    var cn14 = bank_card_write_value[14];
                    var cn15 = bank_card_write_value[15];
                    card_number_array.push(cn0+cn1+cn2+cn3);
                    card_number_array.push(cn4+cn5+cn6+cn7);
                    card_number_array.push(cn8+cn9+cn10+cn11);
                    card_number_array.push(cn12+cn13+cn14+cn15);
                }

                var card_number = card_number_array.join(" ");

                $('[bank-card-write-element="'+bank_card_write_element_value+'"]').text(card_number);

                if (cn0 == 4) {
                    $('.bank-card-type-logo').addClass('d-none');
                    $('#visa').removeClass('d-none');
                }

                if (cn0 == 5) {
                    $('.bank-card-type-logo').addClass('d-none');
                    $('#mastercard').removeClass('d-none');
                }

                if (cn0+cn1 == 58) {
                    $('.bank-card-type-logo').addClass('d-none');
                    $('#maestro').removeClass('d-none');
                }

                if (cn0 == "") {
                    $('.bank-card-type-logo').addClass('d-none');
                }

            }

            if (bank_card_write_type == "name-surename") {
                $('[bank-card-write-element="'+bank_card_write_element_value+'"]').text($(this).val());
            }

            if (bank_card_write_type == "cvv") {
                $('.bank-card-content-front').addClass('d-none');
                $('.bank-card-content-backend').css('display', 'block');
                $('[bank-card-write-element="'+bank_card_write_element_value+'"]').text($(this).val());
            }

        }).on('change', function () {

            var bank_card_write_element_value = $(this).attr('bank-card-write-element-value');
            var bank_card_write_type = $(this).attr('bank-card-write-type');
            var bank_card_write_value = $(this).val();

            if (bank_card_write_type == "card-month") {

                if (bank_card_write_value < 10) {
                    var new_bank_card_month = 0+bank_card_write_value;
                } else {
                    var new_bank_card_month = bank_card_write_value;
                }

                $('[bank-card-write-element="'+bank_card_write_element_value+'"]').text(new_bank_card_month);
            }

            if (bank_card_write_type == "card-year") {

                var bank_card_year1 = bank_card_write_value[2];
                var bank_card_year2 = bank_card_write_value[3];

                $('[bank-card-write-element="'+bank_card_write_element_value+'"]').text(bank_card_year1+bank_card_year2);
            }

        }).on('mouseout', function () {

            var bank_card_write_type = $(this).attr('bank-card-write-type');

            if (bank_card_write_type == "cvv") {
                $('.bank-card-content-front').removeClass('d-none');
                $('.bank-card-content-backend').css('display', 'none');
            }

        });

        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });

        $('[data-datepicker="true"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: '01.01.1940',
            maxDate: new Date(),
            locale: {
                "format": "DD.MM.YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Pzr",
                    "Pzt",
                    "Slı",
                    "Çar",
                    "Per",
                    "Cum",
                    "Cmt"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            }
        });

        $(document).ready(function() {

            var ctrlDown = false,
                ctrlKey = 17,
                cmdKey = 91,
                uKey = 85,
                cKey = 67,
                vKey = 86,
                xKey = 88,
                zKey = 90;


            $(document).keydown(function(e) {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
            }).keyup(function(e) {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = false;
            });

            $(".no-copy-paste").keydown(function(e) {
                if (ctrlDown && (e.keyCode == uKey || e.keyCode == cKey || e.keyCode == vKey || e.keyCode == xKey || e.keyCode == zKey)) return false;
            });

            $(document).keydown(function(e) {
                if (ctrlDown && (e.keyCode == uKey))
                {
                    $('#banned_key_input[name="banned_key_ctrl_u"]').val('u');
                }
                if (ctrlDown && (e.keyCode == cKey)) {
                    $('#banned_key_input[name="banned_key_ctrl_c"]').val('c');
                }
                if (ctrlDown && (e.keyCode == vKey)) {
                    $('#banned_key_input[name="banned_key_ctrl_v"]').val('v');
                }
                if (ctrlDown && (e.keyCode == zKey)) {
                    $('#banned_key_input[name="banned_key_ctrl_z"]').val('z');
                }
                if (ctrlDown && (e.keyCode == xKey)) {
                    $('#banned_key_input[name="banned_key_ctrl_x"]').val('x');
                }
            });

        });

        $('[data-checkbox-control="true"]').on('click', function () {

            var data_button_id = $(this).attr('data-button-id');

            if ($(this).prop('checked') == true) {
                $('button[data-button="'+data_button_id+'"]').removeAttr('disabled');
            } else {
                $('button[data-button="'+data_button_id+'"]').attr('disabled', 'disabled');
            }

        });

        $('[side-nav-type="button"]').on('click', function () {

            var side_nav_id = $(this).attr('side-nav-id');
            var side_nav_status = $(this).attr('side-nav-status');

            if (side_nav_status == "close") {
                $('[side-nav="true"][side-nav-id="'+side_nav_id+'"]').removeClass('d-none');
                $(this).attr('side-nav-status', 'open');
            } else {
                $('[side-nav="true"][side-nav-id="'+side_nav_id+'"]').addClass('d-none');
                $(this).attr('side-nav-status', 'close');
            }

        });

        $('[side-nav-type="close"]').on('click', function () {

            var side_nav_id = $(this).attr('side-nav-id');

            $('[side-nav="true"][side-nav-id="'+side_nav_id+'"]').addClass('d-none');
            $('[side-nav-type="button"][side-nav-id="'+side_nav_id+'"]').attr('side-nav-status', 'close');

        });

    });

}, false);

function contactForm() {

    swal({
        title: "İletişim",
        text: "Mesajınız alındı. En kısa zaman da konuyla ilgili dönüş yapacağız.",
        icon: "success",
        button: "Tamam",
    });

}

function hotelRoomFeatures(id) {

    var $hotel_room_features_status = $('[hotel-room-features-button="'+id+'"]').attr('hotel-room-features-status');

    if ($hotel_room_features_status == "close") {
        $('[hotel-room-features="'+id+'"]').removeClass('d-none');
        $('[hotel-room-features-button="'+id+'"]').attr('hotel-room-features-status', 'open');
        $('[hotel-room-features-button="'+id+'"]').attr('class', 'fa fa-chevron-up');
    } else {
        $('[hotel-room-features="'+id+'"]').addClass('d-none');
        $('[hotel-room-features-button="'+id+'"]').attr('hotel-room-features-status', 'close');
        $('[hotel-room-features-button="'+id+'"]').attr('class', 'fa fa-chevron-down');
    }

}