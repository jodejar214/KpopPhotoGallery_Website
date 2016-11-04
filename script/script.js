$(document).ready(function(){
    //show or hide the optioni to add to more than 1 album
	$("#album2").hide();
	$("#less").hide();
    $("#more").click(function(){
        $("#album2").show();
        $("#less").show();
        $("#more").hide();
    });
    $("#less").click(function(){
        $("#album2").hide();
        $("#less").hide();
        $("#more").show();
    });

    //hide or show images or albums to delete depending on option chosen
    $('.delete').hide();
    $('#delOpt').change(function(){
        $('.delete').hide();
        $('#' + $(this).val()).show();
        var visAlbum = $("#delAlbum").is(":visible");
        var visImage = $("#delImage").is(":visible");
        if(visAlbum){
            $('#delImage').find('.delcheck:checked').removeAttr('checked');
        }
        else if(visImage){
            $('#delAlbum').find('.delcheck:checked').removeAttr('checked');
        }
        $("#delsubmit").attr("disabled", "");
    });

    //enable the submit button to delete when a checkbox is checked
    //disable the submit button for delete when no checkbox is checked
    var checkedBoxes = $(".delcheck");
    checkedBoxes.change(function(){
        var checked = false;
        checkedBoxes.each(function(){
            if(this.checked){
                checked = true;
                return false;
            }
        });

        if(checked){
            $("#delsubmit").removeAttr("disabled");
        }
        else{
            $("#delsubmit").attr("disabled", "");
        }
    });


    //hide or show images or albums to edit depending on option chosen
    $('.edit').hide();
    $('#editOpt').change(function(){
        $('.edit').hide();
        $('#' + $(this).val()).show();
        var visAlbum = $("#editAlbum").is(":visible");
        var visImage = $("#editImage").is(":visible");

        if(visAlbum){
            $('#editImage').find('.editradio:checked').removeAttr('checked');
        }
        else if(visImage){
            $('#editAlbum').find('.editradio:checked').removeAttr('checked');
        }
        $("#editsubmit").attr("disabled", "");
    });

    //enable the submit button to edit when a radio button is selected
    //disable the submit button for edit when no radio button is selected
    var radioButtons = $(".editradio");
    radioButtons.change(function(){
        var checked = false;
        radioButtons.each(function(){
            if(this.checked){
                checked = true;
                return false;
            }
        });

        if(checked){
            $("#editsubmit").removeAttr("disabled");
        }
        else{
            $("#editsubmit").attr("disabled", "");
        }
    });

    $(".add_form form").on('submit', function(){
        var conf = confirm("Are you sure you want to add this?");
        if(conf === true){
            return true;
        }
        else{
            alert("You chose not to add this.");
            return false;
        }
    });

    $("#delForm").on('submit', function(){
        var conf = confirm("Are you sure you want to delete this?");
        if(conf === true){
            return true;
        }
        else{
            alert("You chose not to delete this.");
            return false;
        }
    });

    $("#editForms form").on('submit', function(){
        var conf = confirm("Are you sure you want to make these changes?");
        if(conf === true){
            return true;
        }
        else{
            alert("You chose not to submit the changes.");
            return false;
        }
    });
});