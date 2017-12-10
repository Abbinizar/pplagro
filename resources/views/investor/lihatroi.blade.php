@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">

 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

 

   @for($i=1;$i<=$row->jangka_waktu;$i++)
  ROI {{$i}} : {{(($row->harga+=8000000)-$row->total)/$row->total*0.1}} %
  
   <br>
   Net Profit {{$i}} : {{((($row->harga+=4000000)-$row->total)/$row->total*0.1)*$row->total}}
   <br>
   <hr>
    @endfor

  </div> 

  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



