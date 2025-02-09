<!-- Core Js -->
<script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('backend/js/rt-plugins.js') }}"></script>
<script src="{{ asset('backend/js/popper.js') }}"></script>
<script src="{{ asset('backend/js/SimpleBar.js') }}"></script>
<script src="{{ asset('backend/js/iconify.min.js') }}"></script>

<!-- Jquery Plugins -->

<!-- app js -->
<script src="{{ asset('backend/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>

<script>
    function checkForm(date = null) {
        let isValid = true;

        $("#form-el input, #form-el select, #form-el textarea").each(function() {
            if ($(this).prop("required") && !$(this).val()) { // Pastikan nilai tidak null atau undefined
                // console.log("Element kosong atau tidak ditemukan:", $(this));
                isValid = false;
            }

            if (date != null) {
                let hasHidden = $(date).hasClass('hidden');
                isValid = isValid && hasHidden;
            }

        });

        $("#submit-button").prop("disabled", !isValid);
    }


    function checkDatePeriode(start, end, endWarning) {
        let isValid = true;

        let startDate = $(start).val();
        let endDate = $(end).val();

        if (startDate && endDate) {
            let start = new Date(startDate);
            let end = new Date(endDate);

            if (end < start) {
                $(endWarning).removeClass('hidden');
                return false;
            } else {
                $(endWarning).addClass('hidden');
                return true;
            }
        } else {
            $(endWarning).addClass('hidden');
            return false;
        }
    }
</script>
