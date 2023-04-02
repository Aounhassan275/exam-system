<script>
    
    $(document).on('change', '#college_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
            $('#college_city_id').empty();
            $('#college_city_id').append('<option disabled>Select City</option>');
            for (i=0;i<data.length;i++){
                $('#college_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        });
    });
    $(document).on('change', '#temparory_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
        $('#temparory_city_id').empty();
        $('#temparory_city_id').append('<option selected disabled>Select City</option>');
        for (i=0;i<data.length;i++){
            $('#temparory_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        }
        });
    });
    $(document).on('change', '#temparory_country_id', function (event) {
        country_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_state_against_countries")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'country_id': country_id,
            },
        })
        .done(function (data) {
            $('#temparory_state_id').empty();
            $('#temparory_state_id').append('<option selected disabled>Select State</option>');
            for (i=0;i<data.length;i++){
                $('#temparory_state_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
    $(document).on('change', '#permenant_state_id', function (event) {
        state_id = $(this).val();
        $.ajax({
            url: '{{url("get_city_against_states")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'state_id': state_id,
            },
        })
        .done(function (data) {
        $('#permenant_city_id').empty();
        $('#permenant_city_id').append('<option selected disabled>Select City</option>');
        for (i=0;i<data.length;i++){
            $('#permenant_city_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        }
        });
    });
    $(document).on('change', '#permenant_country_id', function (event) {
        country_id = $(this).val();        
        event.preventDefault();
        $.ajax({
            url: '{{url("get_state_against_countries")}}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            dataType: 'JSON',
            data: {
                'country_id': country_id,
            },
        })
        .done(function (data) {
            $('#permenant_state_id').empty();
            $('#permenant_state_id').append('<option selected disabled>Select State</option>');
            for (i=0;i<data.length;i++){
                $('#permenant_state_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
            }
        })
    });
</script>