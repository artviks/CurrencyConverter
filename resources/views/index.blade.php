<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('Img/bg_eur.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gray-100 bg-opacity-25">

    <div class="grid grid-cols-1 gap-2 place-content-center h-screen">

        <div class="flex justify-center pb-5">

            <img src="Img/EUR.png" height="150px" width="150px">

        </div>

        @if ($errors->any())
            <div class="flex justify-center text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-center">
            <form method="POST" action="/convert">
            @csrf <!-- {{ csrf_field() }} -->

                <select name="rate" id="currency" class="text-yellow-700 font-bold py-2 px-4 border border-yellow-500 rounded">
                    @foreach ($currencies as $cur)
                        <option value="{{ $cur->Rate }}" class="text-yellow-500">
                            {{ $cur->ID }}
                        </option>
                    @endforeach
                </select>

                <input type="number" step="0.01" name="amount" class="py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                <input type="submit" value="Convert" class="bg-white hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">

            </form>
        </div>

        <div class="flex justify-center pb-20">
            <p class="font-bold text-xl text-yellow-500">
                {{ number_format($conversion, 2) }} EUR
            </p>
        </div>


    </div>

</body>

</html>
