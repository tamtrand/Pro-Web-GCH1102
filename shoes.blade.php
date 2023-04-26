@extends('homepage')
@section('Shoes')
<body>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}</li>
        @endforeach
    </ul>
</body>
@endsection