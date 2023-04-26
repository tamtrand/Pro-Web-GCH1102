@extends('homepage')
@section('Shirts')
<body>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} - {{$product->image}}</li>
        @endforeach
    </ul>
</body>
@endsection

