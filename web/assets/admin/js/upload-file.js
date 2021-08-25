$(function(){
    'use strict'
    $('button.uploadFile').on('click', function(){
        $('div.uploadFileForm form input[type=file]').click();
    })
    $(document).on('change', '#loadPhoto', function(){
        $(this).closest('form').ajaxForm({
            target: '#modal_content',
            beforeSubmit: function(){
                showGif();
            },
            success: function(response){
                showGif(false);
                let image = document.getElementById('uploadedPhoto');
                let item_id = $('#item_id').val();
                let cropper = new Cropper(image, {
                    autoCropArea: 1,
                    aspectRatio: 0.8,
                    cropBoxResizable: false
                });
                $('#modal-container').addClass('active').on('click', function(event){
                    const t = $('#modal-container');
                    if (t.is(event.target)){
                        cropper.reset();
                        $('#modal_content').empty();
                        t.removeClass('active');
                        $('#loadPhoto').closest('form').resetForm();
                    }
                })
                $('#savePhoto').on('click', function(){
                    showGif();
                    cropper
                        .getCroppedCanvas({
                            'fillColor': '#fff',
                            'width': 200,
                            height: 250
                        })
                        .toBlob((blob) => {
                            const formData = new FormData();
                            formData.append('croppedImage', blob/*, 'example.png' */);
                            formData.append('item_id', item_id);
                            formData.append('act', 'savePhoto');
                            formData.append('initial', $('#uploadedPhoto').attr('src'));
                            $.ajax('/admin/ajax/item.php', {
                                method: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success(response) {
                                    showGif(false);
                                    let images = JSON.parse(response);
                                    let count = $('#photos li').size();
                                    $('#photos').append(
                                        '<li big="' + images.big + '">' +
                                        '<div>' +
                                        '<a class="loop" href="#">Увеличить</a>' +
                                        '<a table="fotos" class="delete_foto" href="#">Удалить</a>' +
                                        '<span class="main-photo icon-unlocked"></span>' +
                                        '</div>' +
                                        '<img src="' + images.small + '" alt="">' +
                                        '<input type="hidden" name="photos[' + count + '][small]" value="' + images.small + '">' +
                                        '<input type="hidden" name="photos[' + count + '][big]" value="' + images.big + '">' +
                                        '<input type="hidden" name="photos[' + count + '][is_main]" value="0">' +
                                        '</li>'
                                    );
                                    cropper.destroy();
                                    $('#modal_content').empty();
                                    $('#modal-container').removeClass('active');
                                },
                                error() {
                                    console.log('Upload error');
                                },
                            });
                        });
                })
            }
        }).submit();
    })
})