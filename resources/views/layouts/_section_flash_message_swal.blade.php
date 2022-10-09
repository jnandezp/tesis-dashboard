@if(Session::has('error'))
    <script>
        window.addEventListener('load', function () {
            Livewire.emit('showModalMessage', 'error', 'Error!', '{{ Session::get('message') }}');
        });
    </script>
@endif
@if(Session::has('success'))
    <script>
        window.addEventListener('load', function () {
            Livewire.emit('showModalMessage', 'success', 'Exito!', '{{ Session::get('message') }}');
        });
    </script>
@endif
@if(session::has('message'))
    <script>
        window.addEventListener('load', function () {
            Livewire.emit('showModalMessage', 'info', 'Info!', '{{ Session::get('message') }}');
        });
    </script>
@endif
