@if(session()->has('success'))
<div class="alert alert-success text-center w-75 mx-auto" id="alert-success-message">
    <p class="position-absolute top-0 end-0">
        <span class="close-btn f-30" onclick="dismissMessage('alert-success-message');"><i class="icofont icofont-ui-close"></i></span>
    </p>
    {{ session()->get('success') }}
</div>
@elseif(session()->has('error'))
<div class="alert alert-danger text-center w-75 mx-auto" id="alert-error-message">
    <p class="position-absolute top-0 end-0">
        <span class="close-btn f-30" onclick="dismissMessage('alert-error-message');"><i class="icofont icofont-ui-close"></i></span>
    </p>
    {{ session()->get('error') }}
</div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            let alert = document.querySelector('.alert-success');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.remove();
                }, 500); // Time for the fade out transition
            }
        }, 2000); // 2000 milliseconds = 2 seconds
    });
</script>
