<script>
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
</script>
