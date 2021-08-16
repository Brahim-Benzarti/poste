$(()=>{
    $("#ln").change(()=>{
        let value=$("#ln").val();
        let linumber=Number(value);
        if(linumber<10 && linumber>0){
            $("#lilabel").append("<span id='danger' class='text-danger h5' title='required field'>  *</span>")
            $("#li").empty();
            var li=[];
            for(var i=0; i<Number(value); i++){
                li[i]="li_"+i.toString();
            };
            $.post("inputField",{
                _token: $('meta[name="csrf-token"]').attr('content'),
                names: li
            },(data,status)=>{
                $("#li").append(data).append("<li><span class='font-weight-bold'>Use a colon :</span> to have this format.</li>")
            })
        }else{
            $("#danger").remove();
            $("#li").empty();
        }
    })

    $("#gallery").on("change", function (e) {
        var message;
        if(this.files.length>1){
            message=this.files.length+" Images selected";
        }else if(this.files.length==1){
            message=this.files[0]["name"];
        }else{
            message=0;
        }
        $("#filemessage").text(message);
        if(message){
            $("#gallerylabel").removeClass('btn-primary').addClass('btn-success');
        }else{
            $("#gallerylabel").addClass('btn-primary').removeClass('btn-success');
            $("#filemessage").text("Choose Image(s)");
        }
    })
});

