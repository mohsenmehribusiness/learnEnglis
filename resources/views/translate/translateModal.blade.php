<div class="row">
    <button id="buttonTr" class="rounded-50 btn btn-outline-info button-fix"
       data-toggle="modal" data-target="#translateModal">
        <i class="fa fa-language"></i>
    </button>
</div>
<!-- Modal -->
<div  class="modal fade" id="translateModal" role="dialog">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content" style="min-width:800px!important;">
            <div class="modal-body" style="min-height:500px!important;">
                @include('translate.layouts.showTextArea')
            </div>
            <div class="modal-footer border-top-0">
                modal footer
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // get text highlight
        function getSelectionText() {
            let text =null;
            if (window.getSelection) {
                text = window.getSelection().toString();
            } else if (document.selection && document.selection.type != "Control") {
                text = document.selection.createRange().text;
            }
            return text;
        }
        $('#buttonTr').click(function()
        {
            let getSelectionTex=getSelectionText();
            if(getSelectionTex)
            {
                $('#original').val(getSelectionTex);
                source=$('#source').text();
                target=$('#target').text();
                requestAjaxForGetTranslate(source,target,getSelectionTex);
            }
        });
        // send ajax request
        function requestAjaxForGetTranslate(source,target,text){
            $.ajax(
                {
                    url:"{{ route('translate.ajax') }}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{source:source,target:target,'text':text},
                    dataType:"json",
                    success:function(data)
                    {
                        //console.log(data.translate);
                        $('#translated').val(data.translate);
                    },
                    error:function () {
                        alert('some thing error in ajax send');
                    }
                });
        }
        $( "#original" ).keypress(function(e){
            let source,target,text;
            if(e.which == 13) {
                text=$(this).val();
                source=$('#source').text();
                target=$('#target').text();
                requestAjaxForGetTranslate(source,target,text);
            }
        });
    });
</script>
<!-- modal -->
