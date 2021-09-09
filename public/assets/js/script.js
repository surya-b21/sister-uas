$(function() {
    $('#nama_barang').on('input', function() {
        var nama_barang = $(this).val();
        var validName = /^[a-zA-Z0-9 ]*$/;

        if (nama_barang.length == 0) {
            $('.pesan-nama-brg').addClass('invalid-msg').text("Silahkan isi nama barang");
            $(this).addClass('is-invalid').removeClass('is-valid');
         }
         else if (!validName.test(nama_barang)) {
            $('.pesan-nama-brg').addClass('invalid-msg').text('hanya character, spasi, dan angka');
            $(this).addClass('is-invalid').removeClass('is-valid');
         }
         else {
            $('.pesan-nama-brg').empty();
            $(this).addClass('is-valid').removeClass('is-invalid');
         }
    })

    $('#stok').on('input', function() {
        var stok = $(this).val();
        var validName = /^[ 0-9 ]*$/;

        if (stok.length == 0) {
            $('.pesan-stok-brg').addClass('invalid-msg').text("Silahkan isi stok");
            $(this).addClass('is-invalid').removeClass('is-valid');
         }
         else if (!validName.test(stok)) {
            $('.pesan-stok-brg').addClass('invalid-msg').text('hanya angka');
            $(this).addClass('is-invalid').removeClass('is-valid');
         }
         else {
            $('.pesan-stok-brg').empty();
            $(this).addClass('is-valid').removeClass('is-invalid');
         }
    })

    $('.tambah').on('input',function(e){
        if($('#formTambah').find('.is-valid').length==2){
            $('#create-btn').removeClass('allowed-submit')
            $('#create-btn').removeAttr('disabled')
        }
       else{
            e.preventDefault();
            $('#create-btn').attr('disabled');
           }
     });

    $('.editData').on('click', function() {
        $('#tambahDataLabel').html('Edit Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-footer button[type=submit]').attr('id','edit-btn');
        $('.modal-footer button[type=submit]').removeClass('allowed-submit');
        $('.modal-footer button[type=submit]').removeAttr('disabled');
        $('.modal-body form').attr('action', 'update');
        $('.modal-body form').attr('id', 'formEdit');
        $('.modal-body form').attr('onsubmit','return confirm("Apakah anda yakin data sudah benar ?")');
        $('.tambah').attr('class','form-control edit');

        const id = $(this).data('id');
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'getupdate',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama_barang').val(data.nama_barang);
                $('#id_supplier').val(data.id_supplier);
                $('#stok').val(data.stok);
                $('#id').val(data.id);
            }
        });
    });
});
