$(document).ready(function(){

    // FILTER ID MOBIL BERDASARKAN MERK
    $('#merk').change(function(){

        var merk = $(this).val();

        $.ajax({

            url : 'get_kendaraan.php',

            type : 'POST',

            data : {
                merk : merk
            },

            success : function(data){

                $('#id_kendaraan').html(data);

            }

        });

    });

});


// POPUP KONFIRMASI
document.getElementById('formPengajuan')
.addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({

        icon: 'warning',

        title: 'konfirmasi',

        html: `
            <b>
                APAKAH ANDA YAKIN DATA YANG ANDA
                MASUKKAN SUDAH BENAR?
            </b>
        `,

        showCancelButton: true,

        confirmButtonText: 'SUDAH',

        cancelButtonText: 'CANCEL',

        confirmButtonColor: '#1E88E5',

        cancelButtonColor: '#FF0000'

    }).then((result) => {

        if(result.isConfirmed){

            this.submit();

        }

    });

});