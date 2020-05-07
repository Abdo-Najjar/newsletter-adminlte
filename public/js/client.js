const checkboxs = document.querySelectorAll('.form-check-input');
// const checkboxs = $('.form-check-input');


// for (let i = 0; i < checkboxs.length; i++) {


//     checkboxs[i].addEventListener('change' , function(){


//         alert('dsas');

//     });

// }





checkboxs.forEach(function (checkbox)
{

    checkbox.addEventListener('change', function (e)
    {




        const newsletter_id = e.target.parentElement.getAttribute('data-newsletter_id');

        if (e.target.checked)
        {

            $.ajax({
                headers: { 'X-CSRF-TOKEN': csrf },
                type: 'PUT',
                url: `${newsletter_id}/subscribe`,
                success: function (data)
                {
                   notification(data.message);
                }
            });

        } else
        {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': csrf },
                type: 'PUT',
                url: `${ newsletter_id }/unsubscribe`,
                success: function (data)
                {
                    notification(data.message);
                }
            });
        }

    });
}); 



function notification($message){

    toastr["info"]($message)
    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
}