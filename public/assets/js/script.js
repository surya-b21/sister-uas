$(function() {
    $('#nama_barang').on('input', function() {
        var nama_barang = $(this).val();
        var validName = /^[a-zA-Z0-9 ]*$/;

        if (nama_barang.length == 0) {
            $('.pesan-nama-brg').addClass('invalid-msg').text("Silahkan isi nama barang");
            $(this).addClass('invalid-input').removeClass('valid-input');
         }
         else if (!validName.test(nama_barang)) {
            $('.pesan-nama-brg').addClass('invalid-msg').text('hanya character, spasi, dan angka');
            $(this).addClass('invalid-input').removeClass('valid-input');

         }
         else {
            $('.pesan-nama-brg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
         }
    })

    $('#stok').on('input', function() {
        var stok = $(this).val();

        if (stok.length == 0) {
            $('.pesan-stok-brg').addClass('invalid-msg').text("Silahkan isi stok");
            $(this).addClass('invalid-input').removeClass('valid-input');
         }
         else {
            $('.pesan-stok-brg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
         }
    })

    $('input').on('input',function(e){
        if($('#formTambah').find('.valid-input').length==2){
            $('#submit-btn').removeClass('allowed-submit');
            $('#submit-btn').removeAttr('disabled');
        }
       else{
            e.preventDefault();
            $('#submit-btn').attr('disabled','disabled')
           }
     });

     $('.editData').on('click', function() {
        $('#tambahDataLabel').html('Edit Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'update');
        $('.modal-body form').attr('id', 'formEdit');

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

    $('input').on('input',function(e){
        if($('#formEdit').find('.valid-input').length==1){
            $('#submit-btn').removeClass('allowed-submit');
            $('#submit-btn').removeAttr('disabled');
        }
       else{
            e.preventDefault();
            $('#submit-btn').attr('disabled','disabled')
           }
     });
});
