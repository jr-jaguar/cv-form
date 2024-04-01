$(document).ready(function() {

    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry: "ua",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });


    var checkbox = document.querySelector('input[name="agree"]');
    var fileInput = document.getElementById('resume');

    checkbox.addEventListener('change', function() {
        console.log('click');
        if (checkbox.checked) {
            fileInput.setAttribute('accept', 'image/*');
        } else {
            fileInput.removeAttribute('accept');
        }
    });

    $('#contactForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData($(this)[0]);
        var submitBtn = document.getElementById('submitBtn');

        var isChecked = checkbox.checked;
        var fileValue = fileInput.value;

        if (isChecked && (fileValue && !fileValue.match(/(\.jpg|\.jpeg|\.png|\.gif)$/i))) {
            event.preventDefault();
            alert('Please upload an image file.');
            return;
        }

        var isValidPhone = iti.isValidNumber();

        if (!isValidPhone) {
            alert('Please enter a valid phone number.');
            return;
        }


        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                submitBtn.disabled = true
            },
            success: function(response) {
                submitBtn.disabled = false
                alert(response.message);
            },
            error: function(xhr, status, error) {
                submitBtn.disabled = false
                console.error(xhr.responseText);
                var errors = JSON.parse(xhr.responseText).errors;

                $.each(errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                });
            }
        });
    });

    $('#contactForm input, #contactForm textarea').on('input', function() {
        var inputId = $(this).attr('id');
        $('#' + inputId + 'Error').text('');
    });

    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModal");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "flex";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
