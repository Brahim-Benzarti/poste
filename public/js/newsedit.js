var id=$('#id').attr('content');
var tok=$('meta[name="csrf-token"]').attr('content');
var user_id=$("#user_id").attr("content");
var imgdel;
var oldimg;

makeevent=(name)=>{
    $('#'+name+'edit').blur(()=>{
        var newval=$('#'+name+'edit').val();
        if(newval!=$('#old'+name).attr('content')){
            $.post('/EditNews/'+id,{
                v:1,
                _token: tok,
                field: name,
                content: newval,
                user: user_id
            },(data,stat)=>{
                console.log(data);
                console.log(stat);
                if(data=="200"){
                    $('#old'+name).attr({
                        'content': newval
                    });
                    $("#"+name+"success").slideDown();
                    setTimeout(() => {
                        $("#"+name+"success").slideUp();
                    }, 3000);
                }else{
                    $("#"+name+"problem").slideDown();
                    setTimeout(() => {
                        $("#"+name+"problem").slideUp();
                    }, 3000);

                }
            })
        }else{
            console.log("nothing new.");
        }
    })
}
$(()=>{
    //make sure to add id of ___edit in the input
    //and meta with id of old___ for the old value
    //then call the function with the field name
    //also add the success and problem rows. ___success/___problem
    $('#mainedit').focus(()=>{
        makeevent('main')
    })
    $('#titleedit').focus(()=>{
        makeevent('title')
    })
    document.getElementById("titleedit").addEventListener("input",()=>{
        if($("#titleedit").val()==""){
            $("#title").html($('#oldtitle').attr('content'));
            $("#title").css({
                "opacity":"0.5"
            })
        }else{
            $("#title").html($("#titleedit").val());
            $("#title").css({
                "opacity":"1"
            })
        }
    })


    
    // $('#titleedit').change(()=>{
    //     $("#title").html($(this).val());
    // })
    $('#listedit').focus(()=>{
        makeevent('list')
    })
    tolist=(liststring)=>{
        var htmlstring="";
        var listitems=liststring.split('|');
        listitems.forEach(element => {
            var parts=element.split(':');
            htmlstring+="<li><span class='font-weight-bold'>"+parts[0]+" : </span>"+parts[1]+"</li>"
        });
        return htmlstring;
    }
    $("#list").html(tolist($("#listedit").val()));
    document.getElementById("listedit").addEventListener("input",()=>{
        $("#list").html(tolist($("#listedit").val()));
    })


    $('#secondaryedit').focus(()=>{
        makeevent('secondary')
    })



    //for the gallery
    $('#picadd').change(()=>{
        $('#pictureForm').submit();
    })
    $('#pictureForm').on("submit", (e)=>{
        e.preventDefault();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        let fd=new FormData(document.getElementById("pictureForm"));
        fd.append("v",2);
        fd.append("del",imgdel);
        fd.append("index",oldimg);
        fd.append("user",user_id);
        fd.append("news",id);
        $.ajax({
            url:'/EditNews/'+id,
            method: "POST",
            data: fd,
            // dataType:"JSON",
            contentType:false,
            cache:false,
            processData:false,
            success:(data)=>{
                let path="http://"+window.location.host;
                console.log($("img[src='"+path+"/news/"+oldimg+"']").attr('src'));
                $("img[src='"+path+"/news/"+oldimg+"']").attr({
                    "src":path+"/news/"+data
                })
            }
        })
    })

})

updateimage=(i,del)=>{
    imgdel=del;
    oldimg=i;
    document.getElementById('picadd').click();
}

//you need to change the name of the image in the onclick event 
//the server gets an outdated name and nothing happen for the second attempt :p.. 

//fix the delete functionality and make the button work.. and add effects to the images when deleting them 