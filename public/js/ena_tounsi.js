document.getElementById('ds').addEventListener('change',()=>{
    let selectedoffice=document.getElementById("ds").value;
    let url='ena_tounsi_state_offices #'+selectedoffice;
    // alert(url);
    $('#dedicated_status').load(url);
})
