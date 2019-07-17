<script type="text/javascript">

    function formatMyMoney(price) {
        var formattedOutput = new Intl.NumberFormat({
            style: 'currency',
            minimumFractionDigits: 2,
        });
        return formattedOutput.format(price)
    }

    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "{{ route('hotel.room') }}",
            data: {
                room_id: "{{ $room->id }}",
                start_date: "{{ Helper::change_date_format($search['start_date']) }}",
                end_date: "{{ Helper::change_date_format($search['end_date']) }}",
                adult_count: "{{ $search['adult_count'] }}",
                child_count: "{{ $search['child_count'] }}",
                child_ages: "{{ $search['child_ages'] }}",
            },
            success: function (data) {
                $('input[name="room_price"]').val(data.price);
                console.log(data.price);
                $('.room_price').html(formatMyMoney(data.price) + " {{ session('localize.currency') ?? 'TL' }}");
                calcTotal();
            }
        });

        var Status = $('#radio-transfer');
        var currentActive = Status.filter(':checked').data('target');

        var rCollapse = $('.h-collapse-area');
        rCollapse.children().hide();
        $(currentActive).css('display','block');

        $(".h-collapse").click(function () {
            rCollapse.children().hide();
            var target = $(this).data('target');
            $(target).show();
        });

        $('#radio-ulasim').on('click', function () {

            $('#transfer_lists input:checked').each(function() {
                $(this).prop('checked', false);
            });

            var transfer_total = 0;

            $('input[name="transfer_amount"]').val(transfer_total);

            if (transfer_total > 0)
            {
                $('.transfer_price').addClass('d-block');
            }
            else
            {
                $('.transfer_price').removeClass('d-block');
            }

            calcTotal();
        });

        $('input[name="cancel_insurance"]').on('click', function () {
            if ($(this).val() === "1")
            {
                $('input[name="cancel_amount"]').val(500);
                $('.cancel_insurance_price').addClass('d-block');
            }
            else
            {
                $('input[name="cancel_amount"]').val(0);
                $('.cancel_insurance_price').removeClass('d-block');
            }

            $("#cancel_price").html("500");
            calcTotal();
        });

        $('.reservation_transfer').on('click', function () {
            var transfer_total = 0;
            var transfer_type = 0;

            $('#transfer_lists input:checked').each(function() {
                transfer_total += parseInt($(this).data('price'));
                transfer_type = $(this).data('type');
            });

            $('input[name="transfer_amount"]').val(transfer_total);

            if (transfer_total > 0)
            {
                $('.transfer_price').addClass('d-block');
            }
            else
            {
                $('.transfer_price').removeClass('d-block');
            }

            calcTotal(transfer_type);
        });

        function calcTotal(transfer_type)
        {
            var transfer_total = $('input[name="transfer_amount"]').val();
            var room_price = $('input[name="room_price"]').val();
            var cancel_price = $('input[name="cancel_amount"]').val();

            $('input[name="total_amount"]').val(total_amount);

            if (parseFloat(transfer_total) > 0)
            {
                if(transfer_type == 1){
                    transfer_total = parseFloat(Number(transfer_total) * "{{ $search['adult_count'] }}");
                }

                $('#transfer_price').html(transfer_total + " {{ session('localize.currency') ?? 'TL' }}");
            }

            if (parseFloat(cancel_price) > 0)
            {
                $('#cancel_price').html(cancel_price + " {{ session('localize.currency') ?? 'TL' }}");
            }

            if (parseFloat(room_price) > 0)
            {
                $('#room_price').html(room_price + " {{ session('localize.currency') ?? 'TL' }}");

                var total_amount = parseFloat(room_price) + parseFloat(transfer_total) + parseFloat(cancel_price);

                $('.total_amount').html(formatMyMoney(total_amount) + " {{ session('localize.currency') ?? 'TL' }}");
                $('input[name="total_amount"]').val(total_amount);
            }
        }
    });
</script>