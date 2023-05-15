import {main} from "./main.js";
import {notification} from "./notification.js";
import {image} from "./image.js";

$(document).on('click', '.btn-delete-item', function (event) {
    event.preventDefault();
    notification.confirm().then((res) => {
        if (res.isConfirmed){
            const url = $(this).attr('data-url');
            main.sendAjax(url, 'DELETE').then((res) => {
                window.location.href = res.href;
            }).catch((error) => {
                toastr.success("Xóa item thất bại!");
            })
        }
    })
})

$(document).on('change', '.btn-upload-image', function (event) {
    image.preview($(this));
});
