<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>

    <style>
        .modal-content {
            background: none;
            border: none;
        }

        #form {
            border: 2px solid rgb(78, 77, 77);
            padding: 20px 45px;
            border-radius: 30px 0 30px 0;
            box-shadow: 10px 10px 10px gray;
            width: 400px;
            background: #ffffff;
        }

        ::placeholder {
            font-variant: small-caps;
            font-weight: 500;
        }

        #h2 {
            font-variant: small-caps;
            font-weight: bold;


        }

        #button {
            display: flex;
            justify-content: space-between
        }

        #button a {
            text-decoration: none;
            text-transform: capitalize;
            font-size: 16px;
            font-weight: 500;
            color: black;
        }

        #button a:hover {
            text-decoration: underline;
        }

        #input {
            border: 2px solid rgb(207, 207, 207);
            border-radius: 10px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            @foreach ($products as $products)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/product-images/' . $products->image) }}" class="card-img-top"
                            alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $products->name }}</h5>
                            <p class="card-text">{{ $products->desc }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="{{ route('cart', $products->id) }}" class="btn btn-primary">add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>







  



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
