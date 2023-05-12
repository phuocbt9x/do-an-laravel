export const main = (function () {
    const module = {};

    module.sendAjax = function (url, method = "GET", data = null) {
        return $.ajax({
            url,
            data,
            method,
            typeData: "json",
            processData: false,
            contentType: false,
            async: false
        });
    };

    return module;
})(window.jQuery, document, window);

