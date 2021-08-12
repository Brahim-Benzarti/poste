@extends('layouts.app')

@section('content')
<!-- CSS Here -->
<style>
  .scrollbar::-webkit-scrollbar {
    width: 0px;
    height: 0px;
    background-color: white; 
  }
  .maxed{
    height:100%;
    width:100%;
  }
  .maxed-col{
    padding:0;
  }
</style>

<!-- JS Here -->
<script>
  function remove_loader(){
    document.querySelector('.loader').style.display='none';
  };
</script>

<!-- Carousel (slider) -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/1.png" alt="" width="100%" height="500">
      <div class="carousel-caption">
        <h2>Mobile Application</h2>
        <p>Get your ticket from home, put an end for waiting!</p>
        <p>And much more!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="/images/2.png" alt="" width="100%" height="500">
      <div class="carousel-caption">
        <h3>La Poste Tunisienne</h3>
        <p>I don't know man, put something</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="/images/3.png" alt="" width="100%" height="500">
      <div class="carousel-caption">
        <h3>La poste</h3>
        <p>don't know what to put here either!</p>
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

<!-- main body -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 mt-4" style="min-height:750px;">
      <div class="row justify-content-around">
        <div class="col-lg-7 mt-2 maxed-col" style="min-height:365px;">
          <div class="card">
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
                <!-- End modal -->
                <form class="form-inline" method="GET" action="https://www.rapidposte.poste.tn/fr/Item_Events.asp" target="_blank">
                  <input class="form-control" type="text" name="ItemId" id="rapid_post_shipment_number" placeholder="EE000000000TN" required>
                  <input class="btn btn-primary ml-2" type="submit" value="Go">
                </form>
              </div>
            </div> 
          </div>
        </div>
        <div class="col-lg-4 mt-2 maxed-col" style="min-height:365px;">
          <div class="card maxed">
            <img class="card-img-top maxed" src="images/m_post.png" alt="Rapid post">
            <div class="card-img-overlay">
              <h3 class="card-title">Stay Connected!</h3>
              <p class="card-text">with your account via SMS <span class="text-danger">Free</span>.</p>
              <p class="card-text"><a href="/files/form_mpost.pdf" target="_blnak" class="text-primary stretched-link">Click here</a>, and visit us in any Poste Office.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-around mt-2">
        <div class="col-lg-4 mt-2 maxed-col" style="min-height:365px;background-color:white;">
          <div class="card maxed">
            <img class="card-img-top maxed" src="images/ena_tounsi.png" alt="Rapid post">
            <div class="card-img-overlay">
                <a href="{{ route('ena_tounsi') }}" class="text-primary stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-7 mt-2 maxed-col" style="min-height:365px;">
          <iframe class="maxed scrollbar" src="https://www.youtube.com/embed/h7dxvF-KqNY?autoplay=1&mute=1&loop=1" autoplay muted frameborder="0"></iframe>
        </div>
      </div>
    </div>
    <div class="col-lg-3 mt-4 maxed-col scrollbar" style="min-height:750px;overflow:scroll;">
      <div class="spinner-grow loader" style="position:absolute;right:50%;top:50%"></div>
      <iframe class="scrollbar maxed" loading="lazy" src="./currencies" frameborder="0" onload="remove_loader();"></iframe>
    </div>
  </div>
</div>
<iframe style="width:100%;height:200px;margin-top:20px;" src="/featuring" frameborder="0"></iframe>
@endsection