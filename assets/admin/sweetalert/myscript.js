const flashData = $('.flash-data').data('flashdata');

if(flashData){
    Swal.fire({
        title: 'Data Kategori ',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}

// Tombol Hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "data kategori akan di hapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data!',
      }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
      })
});

// Form Error
const formError = $('.form_error').data('form');

if(formError){
    Swal.fire({
        title: formError ,
        text: '',
        icon: 'warning'
    });
}

// Login
const loginFlash = $('.flash-login').data('flash');

if(loginFlash){

    Swal.fire({
        title: loginFlash,
        text: 'Username atau Password tidak tersedia',
        icon: 'warning'
    });
}