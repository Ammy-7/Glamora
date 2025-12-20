@extends('Admin.sidebar')
@section('admin')

<style>
#form{
    border: 2px solid rgb(234, 232, 232);
    padding: 15px 25px;
    box-shadow: 10px 10px 10px gray ;
    background: transparent;
}
::placeholder{
    font-variant:small-caps; 
    font-weight: 500;
}
#button{
    background: #574B90;
    color: white;
    border: 2px solid #574B90 ;
     font-size: 20px;
    font-weight: 500;
}
#button:hover {
    border: 2px solid rgb(39, 39, 39);
    color: #574B90;
    background-color: transparent;
    transition: all 0.5s ease;
}
#input{
    border: 2px solid rgb(207, 207, 207);
    border-radius:10px; 
}
label{
    font-variant: small-caps;
    font-weight: 600;
    margin-top: 12px;
}
</style>

<div class="container mt-2">

    @if (session('successfull'))
        <div class="alert alert-success">
            {{ session('successfull') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">

            <form id="form" action="{{ route('cate-update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <h2 class="text-center mb-4" style="font-variant:small-caps;">
                    Update Category
                </h2>

                <div class="row">

                    <!-- LEFT COLUMN -->
                    <div class="col-md-6">

                        <label>Category Name</label>
                        <input id="input" type="text" name="catename"
                               placeholder="Enter Category Name"
                               class="form-control"
                               value="{{ $data->name }}">

                        @error('catename')
                            <p class="text-danger fw-semibold">{{ $message }}</p>
                        @enderror

                        <label>Description</label>
                        <textarea id="input" name="desc" rows="4"
                                  placeholder="Enter Description"
                                  class="form-control">{{ $data->desc }}</textarea>

                        @error('desc')
                            <p class="text-danger fw-semibold">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-md-6">

                        <label>Category Image</label>
                        <input id="input" type="file" name="cateimage" class="form-control">

                        @error('cateimage')
                            <p class="text-danger fw-semibold">{{ $message }}</p>
                        @enderror

                        <label class="mt-2">Current Image</label>
                        <img id="input" src="{{ url('storage/images/'.$data->image) }}"
                             alt="Category Image"
                             height="120"
                             class="form-control mt-1">

                    </div>

                </div>

                <!-- BUTTON -->
                <button id="button" class="btn mt-4 mb-2 w-100">
                    Update Category
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
