@if(session('success'))
    <script>
        swal({
            title: 'Yeah!',
            type: 'success',
            text: '{!! session('success') !!}'
        })
    </script>
@endif