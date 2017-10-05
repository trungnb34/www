$(document).ready(function() {
    var parent_id = $('#showParentId').val();
    var id = $('#showParentId').attr('data-id');
    var optionParentId = $('#parent_id').find('option');
    var menuId = 0;
    optionParentId.each(function() {
        if($(this).val() == parent_id)
        {
            $(this).attr('selected', 'selected');
            menuId = $(this).attr('data-menu');
        }
        if($(this).val() == id)
        {
            $(this).remove();
        }
    });
    var optionMenuId = $('#menu_id').find('option');
    optionMenuId.each(function () {
        if(menuId != 0 && $(this).val() == menuId)
        {
            $(this).attr('selected', 'selected');
            $('#menu_id').attr('disabled', 'disabled');
        }
    })
    // select option category
    var category_id = $('#showcategory').val();
    var optionCates = $('#optionCates').find('option');
    optionCates.each(function () {
        if($(this).val() == category_id)
        {
            $(this).attr('selected', 'selected');
        }
    });
});