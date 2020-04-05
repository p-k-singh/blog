
@foreach ($posts as $follo)
    {{$follo}}
    @if($follo->cover_images!=null)
    <img src = "/images/{{$follo->cover_images}}" height="100px" width="100px" alt="try" />
@endif
@endforeach

