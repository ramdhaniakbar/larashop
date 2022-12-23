<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Checkout Success</title>

   {{-- Bootstrap CSS --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   {{-- Google Fonts --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   <link rel="stylesheet" href="{{ asset('src/css/app.css') }}">
</head>

<body class="overflow-hidden">
   <div class="container">
      <div class="row d-flex justify-content-center mt-5">
         @if (Session::has('success'))
         <div class="row d-flex justify-content-center">
            <div class="col-sm-6 col-lg-4">
               <div class="alert alert-success" role="alert">
                  {{ Session::get('success') }}
               </div>
            </div>
         </div>
         @endif
         <div class="col-sm-6 col-md-4 col-md-offset-3 col-sm-offset-3">
            <h2>Detail Order</h2>
            <div class="row mt-3">
               <div class="card mb-4">
                  <ul class="list-group list-group-flush py-3">
                     <li class="list-group-item">
                        <strong>Name:</strong>
                        <span class="float-end">{{ $customer[0] }}</span>
                     </li>
                  </ul>
                  <ul class="list-group list-group-flush py-3">
                     <li class="list-group-item">
                        <strong>Phone Number:</strong>
                        <span class="float-end">{{ $customer[1] }}</span>
                     </li>
                  </ul>
               </div>
               <div class="card mb-4">
                  @foreach ($products->items as $product)
                  <ul class="list-group list-group-flush py-2">
                     <li class="list-group-item">
                        <span class="badge text-bg-secondary float-end">{{ $product['qty'] }}</span>
                        <strong>{{ $product['item']['title'] }}</strong>
                        <span class="badge text-bg-success">${{ $product['price'] }}</span>
                     </li>
                  </ul>
                  @endforeach
               </div>
               <div class="card mb-4">
                  <ul class="list-group list-group-flush py-3">
                     <li class="list-group-item">
                        <strong>Total Qty:</strong>
                        <span class="float-end">${{ $products->totalQty }}</span>
                     </li>
                  </ul>
                  <ul class="list-group list-group-flush py-3">
                     <li class="list-group-item">
                        <strong>Total Price:</strong>
                        <span class="float-end">${{ $products->totalPrice }}</span>
                     </li>
                  </ul>
               </div>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Home</a>
         </div>
      </div>
   </div>


   {{-- Bootstrap JS --}}
   <script src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
   </script>
</body>

</html>