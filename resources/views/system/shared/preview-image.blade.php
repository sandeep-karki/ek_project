<script type="text/javascript">
  $(".fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {
            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "height": "100"
                }).appendTo(image_holder);

            }
            $("#image-preview").show();
            // $("#removebtn").show();
            // $("#filepart").removeClass("fileinput fileinput-new");
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

</script>