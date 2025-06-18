// Loading elm
let loadElm = document.getElementById('base-loading')

window.onbeforeunload = function () {
    loadElm.style.display = 'block';
}

// Warna normal untuk notif dll
let colors = {
    'primary'   : '#435ebe',
    'secondary' : '#6c757d',
    'danger'    : '#dc3545',
    'success'   : '#00b09b'
};

// Warna gradient untuk notif dll
let grad_colors = {
    'info'      : 'linear-gradient(to bottom, #33ccff 0%, #3366ff 100%)',
    'danger'    : 'linear-gradient(to bottom, #ff0066 0%, #ff0000 100%)',
    'success'   : 'linear-gradient(to right, #00b09b, #96c93d)'
};

var allBtnSubmit = document.querySelectorAll('.btn-submit');
for (var i = 0; i < allBtnSubmit.length; i++) {
    allBtnSubmit[i].addEventListener('click', function(e) {
        elm = e.target;
        elm.querySelector('.loading-spinner').style.display = 'inline-block';
        elm.disabled = true;
        elm.closest('form').submit();
    });
}

function confirmAction(url, txt='Apakah Anda yakin?', confirmTxt = 'Yakin', denyTxt='Tidak', callback='', target = false)
{
    Swal.fire({
        title: txt,
        showCancelButton: !0,
        confirmButtonColor: colors['danger'],
        cancelButtonColor: colors['secondary'],
        confirmButtonText: confirmTxt,
        cancelButtonText: denyTxt,
        confirmButtonClass: "btn btn-danger mt-2",
        cancelButtonClass: "btn btn-primary mt-2",
    }).then((result) => {
        if (result.isConfirmed) {
            if(url == '' && callback != '')
            {
                callback();
            }
            else
            {
                if (target)
                {
                    window.open(url, target);
                }
                else
                {
                    window.location = url;
                }
            }
        }
    })
}
