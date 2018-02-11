//alert("connect");
jQuery( document ).on( 'click', '#createpost', function() {
    var title = document.getElementsByName("title")[0].value;
    var body = document.getElementsByName("body")[0].value;
    var e = document.getElementById("cat");
    var category = e.options[e.selectedIndex].value;

    var content = jQuery('#createpost').text();
    jQuery(document).ajaxStart(function(){
        jQuery("#wait").css("display", "block");
    });
    jQuery(document).ajaxComplete(function(){
        jQuery("#wait").css("display", "none");
    });

    jQuery.ajax({
        url : getdata_form.ajax_url,
        type : 'post',
        data : {
            action :'createPost',
            cat : category,
            title : title,
            body : body,
            test : '10',
        },
        success : function( response ) {
            alert(response);
        }
    });
    return false;
});