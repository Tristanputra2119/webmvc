//modal update
$(document).ready(function () {
    $(".tampilModalUbah").on("click", function () {
        $("#formModalLabel").html("Ubah data siswa");
        $(".modal-footer button[type=submit]").html("Ubah data");
        $(".modal-body form").attr(
            "action",
            "http://localhost/latihanmvc/public/siswa/ubah"
        );
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/latihanmvc/public/siswa/getubah",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                var BASE_URL = 'http://localhost/latihanmvc/public/img/upload/';
                var imageValue = BASE_URL + data.image;
                $("#nama").val(data.nama);
                $("#kelas").val(data.kelas);
                $("#preview").attr('src', imageValue);
                $("#jurusan").val(data.jurusan);
                $("#id").val(data.id);
            },
        });
    });
});
$(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah data siswa");
    $(".modal-footer button[type=submit]").html("Tambah data");
});

//image preview
$("#image").change(function () {
    const file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (event) {
            console.log(event.target.result);
            $("#preview").attr("src", event.target.result);
            $("#image").show();
        };
        reader.readAsDataURL(file);
    } else {
        $("#preview").hide();
    }
});
