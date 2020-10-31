@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<strong>{{$post->place}}</strong> {{$post->address}}
<div id="map" style="height: 500px; width: 80%; margin: 2rem auto 0;"></div>
  <!-- jqueryの読み込む -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.maps_api_key')}}"></script>
  <!-- js -->
  <script type="text/javascript">
    const address=@json($post->address);
    console.log(address);

    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'address': address}, function(results, status){
      if (status == 'OK') {
        //住所から緯度・経度を取得
        var lat = results[0].geometry.location.lat();
        var lng = results[0].geometry.location.lng();
        //console.log(lat,lng);
        var center={
          lat: lat,
          lng: lng
        }
        //マップを表示
        var map = new google.maps.Map(document.getElementById('map'), {
          center: center,
          zoom: 14
        });
        //マーカーを作成
        var marker=new google.maps.Marker({
          position: center,
          map:map
        });
    }else {
      alert("場所が見つかりませんでした。投稿された住所に間違いがある可能性があります。");
    }
    });
  </script>
@endsection