<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
    width: 0px;
    height: 0px;
    background-color: white; 
  }
    </style>
</head>
<body>
<div class="table-responsive-sm table-hover" style="width:100%">
    <table class="table table-bordered">
        <thead class="thead-dark text-center">
            <tr>
            <th colspan="2">1 TND in:</th>
            </tr>
        </thead>
        <thead class="thead-light text-center">
            <tr>
            <th>Currency</th>
            <th>Is</th>
            </tr>
        </thead>
        <tbody>
            @foreach($currencies as $currency=>$price)
            <tr>
                <td>{{strtoupper($currency)}}</td>
                <td>
                    {{$price['Today']}}
                    <img class="float-right" style="width:20px" src="images/icons/{{$price['status']}}.png" alt="Price status">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>