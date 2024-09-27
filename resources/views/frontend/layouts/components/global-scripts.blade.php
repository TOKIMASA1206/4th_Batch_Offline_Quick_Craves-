<script>
    toastr.options.progressBar = true;

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    $(document).ready(function() {
        // Ser csrf ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* Sweet Alert Config  */
        $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status === 'success') {

                                    toastr.success(response.message)
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "The Data has been deleted.",
                                        icon: "success"
                                    }).then(() => {
                                        window.location.reload();
                                    });

                                } else if (response.status === 'error') {

                                    toastr.error(response.message)
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
    })

    // Load Menu modal
    function loadMenuModal(menuId) {
        $.ajax({
            method: 'GET',
            url: "{{ route('load-menu-modal', ':menuId') }}".replace(':menuId', menuId),
            beforeSend: function() {
                $(".overlay-container").removeClass('d-none');
                $(".overlay").addClass('active');
            },
            success: function(resposnce) {
                $(".load_menu_modal_body").html(resposnce);
                // モーダルの表示（Bootstrap 5）
                var myModal = new bootstrap.Modal(document.getElementById('productDetailModal'));
                myModal.show();
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $(".overlay").removeClass('active');
                $(".overlay-container").addClass('d-none');
            }
        })
    }

    // Show Loader
    function showLoader() {
        $(".loading-overlay-container").removeClass('d-none');
        $(".loading-overlay").addClass('active');
    }

    // Show Loader
    function hideLoader() {
        $(".loading-overlay").removeClass('active');
        $(".loading-overlay-container").addClass('d-none');
    }
</script>
