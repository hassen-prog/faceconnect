$(document).ready(function () {
    // Initialize an array to store amenity values
    var amenityValues = [];

    // Function to add a new amenity input field
    function addAmenityInput() {
        var amenityCount = amenityValues.length + 1;
        var amenityInput =
            '<div class="form-group amenity-input d-flex justify-content-between my-2">' +
            '<input type="text" class="form-control" name="amenities[]" style="width:85%" placeholder="Amenity ' +
            amenityCount +
            '">' +
            '<button type="button" class="btn btn-danger remove-amenity" style="width:10%">-</button>' +
            "</div>";

        // Append the input field to the container
        $("#amenities-section").append(amenityInput);

        // Add an empty entry to the amenityValues array
        amenityValues.push("");
    }

    // Function to update amenity value in the array
    function updateAmenityValue(index, value) {
        amenityValues[index] = value;
    }

    // Function to remove an amenity input field
    function removeAmenityInput(index) {
        console.log(index);
        console.log(amenityValues);
        if (amenityValues.length > 1) {
            amenityValues.splice(index, 1);
            $(this).closest(".amenity-input").remove();
        }
    }

    // Handle input value changes
    $("#amenities-section").on(
        "input",
        "input[name='amenities[]']",
        function () {
            var index = $(this).closest(".amenity-input").index();
            updateAmenityValue(index, $(this).val());
        }
    );

    // Add amenity input when "+" button is clicked
    $("#add-amenity").click(addAmenityInput);

    // Remove amenity input when "-" button is clicked
    $("#amenities-section").on("click", ".remove-amenity", function () {
        var index = $(this).closest(".amenity-input").index();
        removeAmenityInput(index);
    });
    function changeToInput(id) {
        console.log(id)
        var pElement = document.getElementById(id);
        var bElement = document.getElementById("edit-"+id);
        console.log(bElement);
        console.log("edit-"+id)
        var inputElement = document.getElementById("input-"+id);
        var sElement = document.getElementById("submit-"+id);
        pElement.setAttribute("style", "display:none;");
        bElement.setAttribute("style", "display:none;");
        inputElement.setAttribute("style", "display:block;margin-left:50px; width: 90%;");
        sElement.setAttribute("style", "display:block;");

      }
    function changeToP(id) {
        console.log(id);

        var inputElement = document.getElementById(id); 
        var text = inputElement.value;
        var pElement = document.createElement("p");
        pElement.setAttribute("id", id);
        pElement.setAttribute("style", "margin-left:50px;");
        pElement.innerHTML = text;
        inputElement.parentNode.replaceChild(pElement, inputElement);
        var submitElement = document.getElementById("submit-comment");
        var bElement = document.createElement("button");
        bElement.setAttribute("id", "edit-comment");
        bElement.setAttribute("name", id);
        bElement.setAttribute("class", "btn btn-primary float-right");
        bElement.setAttribute("style", "margin-left:50px; margin-top: 10px;");
        bElement.addEventListener("click", function () {
            changeToInput(id);
            }
        );
        bElement.innerHTML = "Edit";
        submitElement.parentNode.replaceChild(bElement,submitElement);

      }
    $(".edit-comment").each(function () {
       $(this).click(function(){
        changeToInput($(this).attr("name"));
       });

    });
  

});
