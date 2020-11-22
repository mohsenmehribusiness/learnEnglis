let settingHead=$('#settingth');
$(document).ready(function () {
    settingHead.mouseenter(function (){
        $(this).css('opacity','1');
    });
    settingHead.mouseleave(function () {
        $(this).css('opacity','0.1');
        if($(this).is( ":checked")){
            $(this).css('opacity','1');
        }
    });



    $("#tableHoverPersian").change(function() {
        $('#labelTableHoverPersian').toggleClass('bg-light');
        $('.persian').each(function () {
            let trueOrFalse=$(this).attr('data-hoverPersian');
            if(trueOrFalse=="true")
                $(this).attr('data-hoverPersian',false);
            else if(trueOrFalse=="false")
                $(this).attr('data-hoverPersian',true);
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
        $('#labelTableHover').toggleClass('bg-light');
        $('#studyTable').toggleClass('table-hover');
    });
    //table hover
    //table border
    $("#tableBorder").change(function() {
        $('#labelTableBorder').toggleClass('bg-light');
        $('#studyTable').toggleClass('table-bordered');
    });
    $('#thWord').click(function () {
        $('#iconWord').toggleClass('fa-align-center');
        $('#iconWord').toggleClass('fa-align-left');
        $('.td-word').each(function () {
            $(this).toggleClass('text-center');
        });
    });
    //visible/hidden persiansWord
    $("#visiblePersian").click(function() {
        $('#iconVisiblePersian').toggleClass('fa-eye-slash fa-eye');
        $('.persian').each(function(){
            $(this).toggleClass('hide');
        });
    });
    //visible/hidden persiansWord
    $("#thNumber").click(function() {
        $('#iconNumber').toggleClass('fa-circle');
        $('#iconNumber').toggleClass('fa-circle-o');
        $('.number').each(function(){
            $(this).toggleClass('hide');
        });
    });

    $("body").on('mouseenter','tr',function() {
        let idTr=$(this).attr('id');
        let first=$($(this)).first();
        let idSpan=idTr+"_persianSpan";
        let attributeHoverPersian=$("#"+idSpan).attr('data-hoverPersian');
        if(attributeHoverPersian=="true") {
            $("#" + idSpan).toggleClass('show hide');
        }
    });
    $("body").on('mouseleave','tr',function() {
        let idTr=$(this).attr('id');
        let first=$($(this)).first();
        let idSpan=idTr+"_persianSpan";
        let attributeHoverPersian=$("#"+idSpan).attr('data-hoverPersian');
        if(attributeHoverPersian=="true") {
            $("#" + idSpan).toggleClass('hide show');
        }
    });
    /******/
    //visible/hidden setting words
    settingHead.change(function(){
        $(this).css('opacity','0.1');
        if($(this).is( ":checked")){
            $(this).css('opacity','1');
        }
        // hideshow all settings ...
        $('.setting').each(function(){
            $(this).toggleClass('hide');
        });
    });
});
