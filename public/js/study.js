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
checkstate=function(id){
    $.ajax(
        {
            url:"{{ route('checkstate') }}",
            method:"POSt",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{id:id},
            dataType:"json",
            success:function(data)
            {
                let ico=$('#state_'+id);
                if(data.state){
                    ico.addClass('text-success fa-check');
                    ico.removeClass('text-danger fa-times');
                }
                else
                {
                    ico.removeClass('text-success fa-check');
                    ico.addClass('text-danger fa-times');
                }
            }
        });
};
getInformationWord=function(id){
    $.ajax(
        {
            url:"{{ route('get.information.word') }}",
            method:"POSt",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{id:id},
            dataType:"json",
            success:function(data)
            {
                let english=data.word['english'];
                let persian=data.word['persian'];
                let sentences=data.word['sentence'];
                $('#english_text_modal').text(english);
                $('#persian_text_modal').text(persian);
                $('#sentences_text_modal').text(null);
                for (i = 0; i < sentences.length; i++){
                    $('#sentences_text_modal').append("<li class='text-muted'>"+sentences[i]+"</li>");
                }
            }
        });
}
$(document).ready(function () {
    //table border
    $("#tableBorder").change(function() {
        $('#studyTable').toggleClass('table-bordered');
    });

    //table hover
    $("#tableHover").change(function() {
        $('#studyTable').toggleClass('table-hover');
    });

    $("#tableHoverPersian").change(function() {
        $('.persian-td').each(function () {
            $(this).addClass('persian-td-active');
        });
    });



    $('.persian-td-active').mouseenter(function () {
            let hamin=$(this).children();
            hamin.removeClass('hide')
            hamin.addClass('show');
    });
    $('.persian-td-active').mouseleave(function () {
        let hamin=$(this).children();
        hamin.addClass('hide')
        hamin.removeClass('show');
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
        });
    });
});
