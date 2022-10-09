@push('script')
    <script>
        window.addEventListener('load', function () {
            Livewire.on('showModalMessage', (status, title, content) => {
                console.log(status);
                console.log(title);
                console.log(content);
                Swal.fire(
                    title,
                    content,
                    status
                )
            })
        });
    </script>
@endpush
