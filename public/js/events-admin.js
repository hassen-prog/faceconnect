$(document).ready(function () {
    $(".tab-content").not(":first").hide();

    $(".tab").click(function () {
        $(".tab").removeClass("active");

        $(".tab-content").hide();

        $(this).addClass("active");

        var contentId = $(this).attr("id").replace("-tab", "-content");
        $("#" + contentId).show();
    });

    var amenityValues = [];

    function addAmenityInput() {
        var amenityCount = amenityValues.length + 1;
        var amenityInput =
            '<div class="form-group amenity-input d-flex justify-content-between my-2 w-50">' +
            '<input type="text" class="form-control" name="amenities[]" style="width:85%" placeholder="Amenity ' +
            amenityCount +
            '">' +
            '<button type="button" class="btn btn-danger remove-amenity" style="width:10%">-</button>' +
            "</div>";

        $("#amenities-section").append(amenityInput);

        amenityValues.push("");
    }

    function updateAmenityValue(index, value) {
        amenityValues[index] = value;
    }

    function removeAmenityInput(index) {
        if (amenityValues.length > 1) {
            amenityValues.splice(index, 1);
            $(this).closest(".amenity-input").remove();
        }
    }

    $("#amenities-section").on(
        "input",
        "input[name='amenities[]']",
        function () {
            var index = $(this).closest(".amenity-input").index();
            updateAmenityValue(index, $(this).val());
        }
    );

    $("#add-amenity").click(addAmenityInput);

    $("#amenities-section").on("click", ".remove-amenity", function () {
        var index = $(this).closest(".amenity-input").index();
        removeAmenityInput(index);
    });
});
