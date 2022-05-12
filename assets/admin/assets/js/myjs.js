const flashData = $('.flash-data').data('flashdata');

if(flashData){
    Swal({
        title: 'Data Kategori Berhasil',
        text: flashData,
        type: 'success'
    });
}

// Tombol Hapus
$('.tombol-hapus').on('click', function(e){

    e.preventDefault();

});