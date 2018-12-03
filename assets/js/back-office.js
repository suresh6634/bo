$( document ).ready(function() {
    console.log("document ready");
    $("#btn-copy").click(function(){
        console.log("button clicked");
        $("#textarea-formatted-dates").select();
        document.execCommand('copy');
        $(".alert-success").show();
    });
});