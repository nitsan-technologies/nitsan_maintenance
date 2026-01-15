import $ from "jquery";

class MaintenanceManager {
    constructor() {
        this.dateToday = new Date();
        this.init();
    }

    init() {
        this.setupEventListeners();
    }

    setupEventListeners() {
        // Remove image handler
    }


    isValidImageFile(filename) {
        const regex = new RegExp('([a-zA-Z0-9\\s_\\.\-:])+(.jpg|.png|.jpeg)$', 'i');
        return regex.test(filename.toLowerCase());
    }
}
    $(document).ready(function() {

    $('.remove-image').on("click",function() {
        handleImageRemoval('image');
    });

    $('.remove-logo').on("click",function() {
        handleImageRemoval('logo');
    });

        $('#maintenance_Submit').on("click",function() {
            var imgaeexist = $('#imageUpload').val();
            var fileUpload = document.getElementById("imageUpload");
            if(imgaeexist) {
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.jpeg)$");
                if (regex.test(fileUpload.value.toLowerCase())) {
                    $('.invalidImage').hide();
                    $('.requiredImage').hide();
                    return true;
                } else {
                    $('.invalidImage').show();
                    return false;
                }
            }
            else{
                if($("#themelayout").val() == 2) {
                    if($("#imageUpload").length > 0 ){
                        if($('#imageUpload-file-reference').length <= 0){
                            $('.requiredImage').show();
                            return false;
                        }
                    }
                }
            }
        });
    });
    
    function handleImageRemoval(image) {
        $('.'+image+'-wrapper').hide();
        $('#'+image+'-delete').val('1');
    }
