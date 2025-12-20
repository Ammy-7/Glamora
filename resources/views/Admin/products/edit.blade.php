 @extends('Admin.sidebar')
 @section('admin')
   
         <div class="container mt-2">
             <div class="row">
                 @if (session('success'))
                     <div class="alert alert-success">
                         {{ session('success') }}</div>
                 @endif
                 <div class="col-md-2"></div>
                 <div class="col-md-8">


                     <div class="row">
                         <form id="form" action="{{ route('insert-pro') }}" method="post" enctype="multipart/form-data">
                             @csrf

                             <h1 class="text-center mt-4" style="font-variant:small-caps;">
                                 update form
                             </h1>

                             <div class="container">
                                 <div class="row g-3"> <!-- g-3 for spacing between columns -->

                                     <!-- LEFT COLUMN -->
                                     <div class="col-md-6">

                                         <div class="mb-3">
                                             <label for="pro_name" class="form-label">Product Name</label>
                                             <input id="input" class="form-control" type="text" name="pro_name"
                                                 placeholder="Enter name">
                                             @error('pro_name')
                                                 <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                         </div>

                                         <div class="mb-3">
                                             <label for="desc" class="form-label">Description</label>
                                             <textarea id="input" class="form-control" name="desc" rows="4" placeholder="Description"></textarea>
                                         </div>

                                         <div class="mb-3">
                                             <label for="pro_image" class="form-label">Product Image</label>
                                             <input id="input" class="form-control" type="file" name="pro_image">
                                             @error('pro_image')
                                                 <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                         </div>

                                     </div>

                                     <!-- RIGHT COLUMN -->
                                     <div class="col-md-6">

                                         <div class="mb-3">
                                             <label for="price" class="form-label">Price</label>
                                             <input id="input" class="form-control" type="text" name="price"
                                                 placeholder="Enter price">
                                             @error('price')
                                                 <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                         </div>

                                         <div class="mb-3">
                                             <label for="quantity" class="form-label">Quantity</label>
                                             <input id="quantity" class="form-control" type="number" name="quantity"
                                                 placeholder="Enter quantity">
                                             @error('quantity')
                                                 <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                         </div>

                                         <div class="mb-3">
                                             <label for="category_id" class="form-label">Category</label>
                                             <select id="input" class="form-control" name="category_id">
                                                 @foreach ($category as $data)
                                                     <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>

                                     </div>

                                 </div>

                                 <div class="text-center mt-4">
                                     <button id="button" class="btn mb-4 w-100">update</button>
                                 </div>
                             </div>
                         </form>




                     </div>
                 </div>

                 <div class="col-md-2"></div>
             </div>
         </div>
     @endsection
