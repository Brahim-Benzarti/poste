document.getElementById('ds').addEventListener('change',()=>{
    let selectedoffice=document.getElementById("ds").value;
    let url='ena_tounsi_state_offices #'+selectedoffice;
    // alert(url);
    $('#dedicated_status').load(url);
})

popup=(status)=>{
    if(status){
        document.getElementById('vidpopup').click();
        var closemodel = document.getElementById('close');
        window.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closemodel.click();
            }
        });
    }else{//to remove the popup automatically
        let div=document.getElementById('myModal');
        div.parentNode.removeChild(div);
    }
}



button_style_change=(args)=>{
    args.forEach(arg => {
        document.getElementById(arg).addEventListener('change', ()=>{
            let name= document.getElementById(arg).value.split('\\')[document.getElementById(arg).value.split('\\').length - 1];
            if(name){
                document.getElementById(arg+'message').childNodes[0].innerHTML=name;
                document.getElementById(arg+'message').classList.remove('btn-primary');
                document.getElementById(arg+'message').classList.add('btn-success');
            }else{
                document.getElementById(arg+'message').classList.add('btn-primary');
                document.getElementById(arg+'message').classList.remove('btn-success');
                document.getElementById(arg+'message').childNodes[0].innerHTML="Choose a file";
            }
        })
    })
}

button_style_change(['cincopy','porcopy']);//add any other button here


/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
