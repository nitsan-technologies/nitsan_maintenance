import $ from 'jquery';
    class MaintenanceManager {
        constructor() {
            this.dateToday = new Date();
            this.init();
        }

        init() {
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Submit button handler
            $('#maintenance_Submit').on('click', () => this.handleImageValidation());

            // Remove image handler
            $('.remove-image').on('click', () => this.handleImageRemoval());
        }

        handleImageValidation() {
            const imageInput = $('#imageUpload');
            const imageValue = imageInput.val();
            const fileUpload = document.getElementById('imageUpload');

            if (imageValue) {
                const isValidImage = this.isValidImageFile(fileUpload.value);
                if (isValidImage) {
                    $('.invalidImage').hide();
                    return true;
                } else {
                    $('.invalidImage').show();
                    return false;
                }
            }
        }

        handleImageRemoval() {
            $('.image-wrapper').hide();
            $('#image-delete').val('1');
        }

        isValidImageFile(filename) {
            const regex = new RegExp('([a-zA-Z0-9\\s_\\.\-:])+(.jpg|.png|.jpeg)$', 'i');
            return regex.test(filename.toLowerCase());
        }
    }

    $(document).ready(() => {
        new MaintenanceManager();
    });

