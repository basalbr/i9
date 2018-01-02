$(function() {
    //===== Validation engine =====//

    $("#validate").validationEngine();

    //===== Form elements styling =====//

    $("select, input:checkbox, input:radio, input:file").uniform();

})