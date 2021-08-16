@extends('layouts.app')

@section('content')

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" style="display:none;" data-toggle="modal" data-target="#myModal" id="vidpopup">
  Open modal
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg modal-dialog-centered ">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <iframe @if(count($errors)>0) onload="popup(0);" @else onload="popup(1);" @endif style="width:100%;height:60vh;" src="https://www.youtube.com/embed/bXWLVP3G1H0?controls=0&autoplay=1&modestbranding=1&rel=0" frameborder="0" ></iframe>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-danger" data-dismiss="modal" onclick="setTimeout(()=>{this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode)},500);">Close</button>
      </div>

    </div>
  </div>
</div>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Demand of reservation for the « Ena Tounsi » pack.') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ena_tounsi') }}" enctype="multipart/form-data">

                        @csrf

                        <!-- civility -->
                        <div class="form-group row">
                            <label for="civility" class="col-md-4 col-form-label text-md-right">{{ __('Civility') }}</label>

                            <div class="col-md-6">
                                <select id="civility" class="form-control @error('civility') is-invalid @enderror" name="civility" value="{{ old('civility') }}" required autocomplete="civility" autofocus>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss.</option>
                                </select>

                                @error('civility')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- full name -->
                        <div class="form-group row">
                            <label for="fn" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fn" type="text" class="form-control @error('fn') is-invalid @enderror" name="fn" value="{{ old('fn') }}" required autocomplete="fn" autofocus>

                                @error('fn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ln" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="ln" type="text" class="form-control @error('ln') is-invalid @enderror" name="ln" value="{{ old('ln') }}" required autocomplete="ln" autofocus>

                                @error('ln')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- etat civil -->
                        <div class="form-group row">
                            <label for="civilstatus" class="col-md-4 col-form-label text-md-right">{{ __('Civil Status') }}</label>

                            <div class="col-md-6">
                                <select id="civilstatus" class="form-control @error('civilstatus') is-invalid @enderror" name="civilstatus" value="{{ old('civilstatus') }}" required autocomplete="civilstatus" autofocus>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widow">Widow(er)</option>
                                </select>

                                @error('civilstatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- nationality -->
                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" autofocus>

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- birth date and place -->
                        <div class="form-group row">
                            <label for="bd" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">
                                        <input id="bd" type="date" class="form-control @error('bd') is-invalid @enderror" name="bd" value="{{ old('bd') }}" required autocomplete="bd" autofocus>

                                        @error('bd')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="bd_place" class="col-sm-4 col-form-label text-sm-right">{{ __('Place') }}</label>

                                    <div class="col-sm-8">
                                        <input id="bd_place" type="text" class="form-control @error('bd_place') is-invalid @enderror" name="bd_place" value="{{ old('bd_place') }}" required autocomplete="bd_place" autofocus>

                                        @error('bd_place')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- childrens -->
                        <div class="form-group row">
                            <label for="children" class="col-md-4 col-form-label text-md-right">{{ __('Children') }}</label>

                            <div class="col-md-6">
                                <select id="children" class="form-control @error('children') is-invalid @enderror" name="children" value="{{ old('children') }}" required autocomplete="children" autofocus>
                                    <option value="0">None</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>

                                @error('children')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- CIN -->
                        <div class="form-group row">
                            <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('CIN') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">
                                        <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus>

                                        @error('cin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cindate" class="col-xl-4 col-form-label text-xl-right">{{ __('Date delivered') }}</label>

                                    <div class="col-xl-8">
                                        <div class="form-group row">
                                            <div class="col">
                                                <input id="cindate" type="date" class="form-control @error('cindate') is-invalid @enderror" name="cindate" value="{{ old('cindate') }}" required autocomplete="cindate" autofocus>

                                                @error('cindate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label for="cinplace" class="col-sm-4 col-form-label text-sm-right">{{ __('Place') }}</label>

                                            <div class="col-sm-8">
                                                <input id="cinplace" type="text" class="form-control @error('cinplace') is-invalid @enderror" name="cinplace" value="{{ old('cinplace') }}" required autocomplete="cinplace" autofocus>

                                                @error('cinplace')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="cincopy" class="col-sm-4 col-form-label text-sm-right">{{ __('Upload a copy') }}</label>

                                    <div class="col-sm-8">
                                        <label id="cincopymessage" class="btn btn-primary form-control @error('cincopy') is-invalid @enderror"><span>Choose a file</span>
                                            <input id="cincopy" type="file" style="visibility:hidden;" name="cincopy" value="{{ old('cincopy') }}" required autocomplete="cincopy" autofocus>
                                        </label>
                                        <!-- <p id="cincopymessage" class="text-success"></p> -->
                                        <!-- <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> -->

                                        @error('cincopy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Proof of residency -->
                        <div class="form-group row">
                            <label for="por" class="col-md-4 col-form-label text-md-right">{{ __('Proof of residency') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">

                                        <select id="por" class="form-control @error('por') is-invalid @enderror" name="por" value="{{ old('por') }}" required autocomplete="por" autofocus>
                                            <option value="passport">Passport</option>
                                            <option value="rpermit">Residency permit</option>
                                            <option value="cid">Consular identification card</option>
                                        </select>

                                        @error('por')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="pornumber" class="col-sm-4 col-form-label text-sm-right">{{ __('Number') }}</label>

                                    <div class="col-sm-8">
                                        <input id="pornumber" type="text" class="form-control @error('pornumber') is-invalid @enderror" name="pornumber" value="{{ old('pornumber') }}" required autocomplete="pornumber" autofocus>

                                        @error('pornumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <label for="porexdate" class="col-sm-4 col-form-label text-sm-right">{{ __('Expiration date') }}</label>

                                    <div class="col-sm-8">
                                        <input id="porexdate" type="date" class="form-control @error('porexdate') is-invalid @enderror" name="porexdate" value="{{ old('porexdate') }}" required autocomplete="porexdate" autofocus>

                                        @error('porexdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="porcopy" class="col-sm-4 col-form-label text-sm-right">{{ __('Upload a copy') }}</label>

                                    <div class="col-sm-8">

                                        <label id="porcopymessage" class="btn btn-primary form-control @error('porcopy') is-invalid @enderror"><span>Choose a file</span> 
                                            <input id="porcopy" onprogress="alert('fun');" style="visibility:hidden;" id="porcopy" type="file" name="porcopy" value="{{ old('porcopy') }}" required autocomplete="porcopy" autofocus>
                                        </label>

                                        @error('porcopy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>


                        <!-- Tunisian adress -->
                        <div class="form-group row">
                            <label for="tadress" class="col-md-4 col-form-label text-md-right">{{ __('Tunisian adress') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">
                                        <input id="tadress" type="text" class="form-control @error('tadress') is-invalid @enderror" name="tadress" value="{{ old('tadress') }}" required autocomplete="tadress" autofocus>

                                        @error('tadress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tcity" class="col-xl-2 col-form-label text-xl-right">{{ __('City') }}</label>

                                    <div class="col-xl-4">
                                        <input id="tcity" type="text" class="form-control @error('tcity') is-invalid @enderror" name="tcity" value="{{ old('tcity') }}" required autocomplete="tcity" autofocus>

                                        @error('tcity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="tpostalcode" class="col-xl-3 col-form-label text-xl-right">{{ __('Postal code') }}</label>

                                    <div class="col-xl-3">
                                        <input id="tpostalcode" type="text" class="form-control @error('tpostalcode') is-invalid @enderror" name="tpostalcode" value="{{ old('tpostalcode') }}" required autocomplete="tpostalcode" autofocus>

                                        @error('tpostalcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tnumber" class="col-xl-4 col-form-label text-xl-right">{{ __('Tunisian phone number') }}</label>

                                    <div class="col-xl-8">
                                        <input id="tnumber" type="text" class="form-control @error('tnumber') is-invalid @enderror" name="tnumber" value="{{ old('tnumber') }}" required autocomplete="tnumber" autofocus>

                                        @error('tnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- foreign adress -->
                        <div class="form-group row">
                            <label for="fadress" class="col-md-4 col-form-label text-md-right">{{ __('Foreign adress') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">
                                        <input id="fadress" type="text" class="form-control @error('fadress') is-invalid @enderror" name="fadress" value="{{ old('fadress') }}" required autocomplete="fadress" autofocus>

                                        @error('fadress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fcountry" class="col-xl-4 col-form-label text-xl-right">{{ __('Foreign Country') }}</label>

                                    <div class="col-xl-8">
                                        <input id="fcountry" type="text" class="form-control @error('fcountry') is-invalid @enderror" name="fcountry" value="{{ old('fcountry') }}" required autocomplete="fcountry" autofocus>

                                        @error('fcountry')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fcity" class="col-xl-2 col-form-label text-xl-right">{{ __('City') }}</label>

                                    <div class="col-xl-4">
                                        <input id="fcity" type="text" class="form-control @error('fcity') is-invalid @enderror" name="fcity" value="{{ old('fcity') }}" required autocomplete="fcity" autofocus>

                                        @error('fcity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="fpostalcode" class="col-xl-3 col-form-label text-xl-right">{{ __('Postal code') }}</label>

                                    <div class="col-xl-3">
                                        <input id="fpostalcode" type="text" class="form-control @error('fpostalcode') is-invalid @enderror" name="fpostalcode" value="{{ old('fpostalcode') }}" required autocomplete="fpostalcode" autofocus>

                                        @error('fpostalcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fnumber" class="col-xl-4 col-form-label text-xl-right">{{ __('Foreign phone number') }}</label>

                                    <div class="col-xl-8">
                                        <input id="fnumber" type="text" class="form-control @error('fnumber') is-invalid @enderror" name="fnumber" value="{{ old('fnumber') }}" required autocomplete="fnumber" autofocus>

                                        @error('fnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <!-- Profession -->
                        <div class="form-group row">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>

                            <div class="col-md-6">
                                <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" autofocus>

                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- delivery office -->
                        <div class="form-group row">
                            <label for="do" class="col-md-4 col-form-label text-md-right">{{ __('Proof of residency') }}</label>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col">

                                        <select id="ds" class="form-control @error('ds') is-invalid @enderror" name="ds" value="{{ old('ds') }}" required autocomplete="ds" autofocus>
                                            <option value="0" selected>Select a State</option>
                                            @foreach($deliveryOffice as $state=>$offices)
                                                <option value="{{$state}}">{{$state}}</option>
                                            @endforeach
                                        </select>

                                        @error('ds')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="dedicated_status">

                                </div>
                            </div>
                        </div>

                        <!-- terms and conditions -->


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} required>

                                    <label class="form-check-label" for="terms">I've read and Accepted</label>
                                    <a href="files/ena_tounsi_terms.pdf">the general terms of « Ena Tounsi ».</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <p>Please inform us, by email at <a href="mailto:TRE@poste.tn">TRE@poste.tn</a>, within ten days of your next visit to Tunisia to make your savings book and Platinum card available to you at the chosen office.</p>
                            </div>
                        </div>

                        <!-- old -->
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/ena_tounsi.js"></script>
@endsection
