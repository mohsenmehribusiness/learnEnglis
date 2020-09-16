let settingHead=$('#settingth');
settingHead.mouseenter(function (){
    $(this).css('opacity','1');
});
settingHead.mouseleave(function () {
    $(this).css('opacity','0.1');
    if($(this).is( ":checked")){
        $(this).css('opacity','1');
    }
});
settingHead.change(function(){
    $(this).css('opacity','0.1');
    if($(this).is( ":checked")){
        $(this).css('opacity','1');
    }
});

$(document).ready(function () {

    $("#tableHoverPersian").change(function() {
        $('.persian-td').each(function () {
            $(this).toggleClass('persian-td-active');
        });
    });

    //visible/hidden persiansWord
    $("#visiblePersian").change(function() {
        $('.persian').each(function(){
            $(this).toggleClass('hide');
        });
    });

    //column setting
    $("#settingth").change(function() {
        $('.settingtd').each(function(){
            $(this).toggleClass('show');
            $(this).toggleClass('hide');
        });
    });

    //table hover
    $("#tableHover").change(function() {
        $('#studyTable').toggleClass('table-hover');
    });
    //table hover

    //table border
    $("#tableBorder").change(function() {
        $('#studyTable').toggleClass('table-bordered');
    });
    //table border
});
