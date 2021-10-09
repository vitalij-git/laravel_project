<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height"> --}}
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Edit</th>
                </tr>

                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td><a href="{{route('author.show', [$author])}}">{{ $author->name }}</a></td>
                        <td>{{ $author->surname }} </td>
                        <td>{{ $author->username }} </td>
                        <td><a href="{{route('author.edit',[$author])}}">Edit</a></td>
                        <td><form action="{{route('author.destroy', [$author])}}" method="post">
                        @csrf
                        <button type="submit">Delete</button>
                        </form></td>
                    </tr>
                @endforeach


            </table>
        {{-- </div> --}}
    </body>
</html>
