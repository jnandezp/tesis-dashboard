<script>
    window.addEventListener('load', function () {
        Livewire.on('showModalDeletePost', (postId) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deletePost', postId)
                }
            })
        })

        Livewire.on('showDeleteSuccess', (response) => {
            console.log(response);
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        })
    });

</script>
