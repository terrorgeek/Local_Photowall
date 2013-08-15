$(function(){
    $(".search").keyup(function()
    {
        var inputSearch = $(this).val();
        var dataString = 'keyword='+ inputSearch;
        if(inputSearch!='')
        {
            $.ajax({
                type: "GET",
                url: "../home/search_friends.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#divResult").html(html).show();
                }
            });
        }return false;
    });

    jQuery("#divResult").live("click",function(e){
        var $clicked = $(e.target);
        var $name = $clicked.find('.name').html();
        var decoded = $("<div/>").html($name).text();
        $('#inputSearch').val(decoded);
    });
    jQuery(document).live("click", function(e) {
        var $clicked = $(e.target);
        if (! $clicked.hasClass("search")){
            jQuery("#divResult").fadeOut();
        }
    });
    $('#inputSearch').click(function(){
        jQuery("#divResult").fadeIn();
    });
});