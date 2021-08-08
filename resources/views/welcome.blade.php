@extends('layouts.app')

@section('content')

    
<style>
  /* Make the image fully responsive */
  /* .carousel-inner img {
    width: 100%;
    height: 100%;
  } */
  .scrollbar::-webkit-scrollbar {
    width: 0px;
    height: 0px;
    background-color: white; 
  }
</style>
<script>
  function remove_loader(){
    document.querySelector('.loader').style.display='none';
  };
</script>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/1.png" alt="Los Angeles" width="100%" height="500">
      <div class="carousel-caption">
        <h2>Mobile Application</h2>
        <p>Get your ticket from home, put an end for waiting!</p>
        <p>And much more!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="/images/2.png" alt="Chicago" width="100%" height="500">
      <div class="carousel-caption">
        <h3>Title</h3>
        <p>I don't know man, put something</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="/images/3.png" alt="New York" width="100%" height="500">
      <div class="carousel-caption">
        <h3>Title!!</h3>
        <p>shit!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div style="height:30px;width:100%"></div>
<div class="container" style="height:350px">
    <div class="row justify-content-between" style="height:350px">
        <div class="col-lg-4 card" style="padding:0;height:350px;">
          <img class="card-img-top" src="images/looking_for_rapid_post.png" alt="Rapid post" style="widht:100%;height:100%">
          <div class="card-img-overlay">
            <h2 class="card-title">Track your<br><span class="text-primary">Rapid-Post</span><br>shipments</h2>
            <div style="position:absolute;bottom:15px;">
              <p class="card-text">Fill you shipment number:</p>
              <!-- Button to Open the Modal -->
              <p class="card-text">Can't <a data-toggle="modal" href="#myModal" class="text-primary">find</a> it?</p>
              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-md modal-dialog-centered ">
                  <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body" style="margin:auto;width:fit-content;">
                      <img src="images/rapid_post_num_info.jpg" alt="Rapid post number sample">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Got it!</button>
                    </div>
                  </div>
                </div>
              </div>
              <form class="form-inline" method="GET" action="https://www.rapidposte.poste.tn/fr/Item_Events.asp" target="_blank">
                <input class="form-control" type="text" name="ItemId" id="rapid_post_shipment_number" placeholder="EE000000000TN" required>
                <input class="btn btn-primary ml-2" type="submit" value="Go">
              </form>
            </div>
          </div> 
        </div>
        <div class="col-lg-3 card" style="height:350px;padding:0;">
          <img class="card-img-top" src="images/m_post.png" alt="Rapid post" style="widht:100%;height:100%">
          <div class="card-img-overlay">
            <!-- <div  style="position:absolute;bottom:15px;"> -->
              <h3 class="card-title">Stay Connected!</h3>
              <p class="card-text">with your account via SMS <span class="text-danger">Free</span>.</p>
              <p class="card-text"><a href="/files/form_mpost.pdf" target="_blnak" class="text-primary stretched-link">Click here</a>, and visit us in any Poste Office.</p>
            <!-- </div> -->
          </div>
        </div>
        <div class="col-lg-4 scrollbar scrollbar-light" style="height:730px;overflow:scroll;position:relative;">
          <div class="spinner-grow loader" style="position:absolute;right:50%;top:50%"></div>
          <iframe loading="lazy" style="width:100%;height:730px" src="./currencies" frameborder="0" onload="remove_loader();"></iframe>
        </div>
    </div>
</div>
<div style="height:30px;width:100%"></div>
<div class="container" style="height:350px;min-height:350px">
  <div class="row justify-content-start" style="height:350px">
    <div class="col-lg-2" ></div>
    <div class="col-lg-3 card" style="height:350px;padding:0;">
      <img class="card-img-top" src="images/ena_tounsi.png" alt="Rapid post" style="widht:100%;height:100%">
      <div class="card-img-overlay">
          <a href="#" target="_blnak" class="text-primary stretched-link"></a>
      </div>
    </div>
  </div>
</div>
<div style="height:30px;width:100%"></div>
<iframe style="width:100%;height:200px;" src="/featuring" frameborder="0"></iframe>

@endsection