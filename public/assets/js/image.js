export const image = (function () {
    const module = {};

    module.preview = (element)=>{
        const file = $(element)[0].files[0];
        const elementPreview = $('.preview-image');
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            const url = URL.createObjectURL(file);
            elementPreview.attr("src", url);
        };
    }
    return module;
})();
