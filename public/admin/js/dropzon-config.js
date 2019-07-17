var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 1000,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Sil',
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000,

    init: function () {
        this.on("removedfile", function (file) {
            var imageId = $(file.previewElement).attr('data-id');
            var imagePath = $(file.previewElement).attr('data-path')
            console.log(imageId);
            $.post({
                url: '/adminpanel/hotel_remove_file',
                data: {id: imageId, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },
    success: function (file, response) {
        console.log(response);
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
        $(file.previewElement).attr('data-id',response.files[0].id);
    }
};

$(".dz-remove").click(function () {
    var imageId = $(this).closest('.dz-preview');
    $.ajax({
        url:imageId.data("path"),
        type:"POST",
        data:{id:imageId.data("id"), _token: $('[name="_token"]').val()},
        success : function (data) {
            imageId.hide();
        }
    })
});
