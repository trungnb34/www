$(document).ready(function ()
{
    $('#parent_id').change(function()
    {
        replaceElement();
        var choose = $(this).val();
        //console.log('choose' + choose);
        var options = $(this).find('option');
        var menu_id = null;
        // noinspection JSAnnotator

        options.each(function ()
        {
            if($(this).attr('value') == choose)
            {
                //console.log('value' + )
                menu_id = $(this).attr('data-menu');
            }
        });
        //console.log('menu' + menu_id);
        if(menu_id != 0)
        {
            var menus = $('#menu_id').find('option');
            menus.each(function ()
            {
                if($(this).val() == menu_id)
                {
                    $(this).attr('selected', 'selected');
                    $(this).attr('id', 'activeMenu');
                    $('#menu_id').attr('disabled', 'disabled');
                }
            });
        }
    });

    function replaceElement()
    {
        $('#menu_id').prop( "disabled", null );
        var optionActive = $('#activeMenu');
        var option = '<option value="'+ optionActive.val() + '">' + optionActive.html() + '</option>';
        optionActive.replaceWith(option);
    }

    $('#from-add-cate').submit(function()
    {
        $('#menu_id').prop( "disabled", null );
    });
});