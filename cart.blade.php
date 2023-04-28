@extends('layout')
@section('admin')

        <div class="container">
            <h1>Products List</h1>
           
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Images</th>
                        <th>Quantity</th> 
                        <th>Size</th>   
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img class="card-img-top" src="{{ asset('images/' . $product->image) }}" style="max-height:100px;"></td>
                        <form action="{{ route('cart.edit', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <td><h4 class="card-title"><input type="text" class="form-control" id="quantity"  name="quantity" value="{{ $product->quantity }}" required></h4>
                            
                        <td>      <select id="size"  name="size">
                                    <option value='{{ $product->size }}'>{{ $product->size }}(Your Choosen)</option>
                                    <option value='L'>L</option>
                                    <option value='XL'>XL</option>
                                    <option value='XXL'>XXL</option>
                                </select>
                               
                        </td>   
                        <td><button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure About This Changed')"> Update</button>    </td>
                    </form>  
            
                        <td>
                            
                            <form action="{{ route('cart.delete', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you definitely want to delete this product?')">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
           
            
           
           </div>
        <div>
            <form action="{{ route('cart.clear') }}" method="POST">
              @csrf
              <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
            </form>
          </div>
          @endsection
         