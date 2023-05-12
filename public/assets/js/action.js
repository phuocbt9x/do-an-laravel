import './main.js'
import {main} from "./main.js";
export const notification = (function () {
    const module = {};
    const Swal = window.Swal;

    module.confirm = function (message = "You won't be able to revert this!") {
        return Swal.fire({
            title: "Are you sure?",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        });
    };

    module.success = function (type, message) {
        Swal.fire({
            icon: "success",
            type,
            title: "Success!",
            text: message
        });
    };

    module.error = function (message) {
        Swal.fire({
            icon: "error",
            type: "error",
            title: "Error!",
            text: message
        });
    };

    return module;
})(window.jQuery, document, window);


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
