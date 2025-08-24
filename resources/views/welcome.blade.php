<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="body">
    <div class="window">
        <header>
            <div>
                <div class="bg-red-500 ball"></div>
                <div class="bg-yellow-500 ball"></div>
                <div class="bg-green-500 ball"></div>
            </div>
            <h1>TO-DO LIST</h1>
        </header>

        <main>
            <form method="post" action="{{ route('activy.create') }}" class="panel">
                @csrf
                <input type="text" name="title">
                <button type="submit" class="btn-primary">Criar tarefa</button>
            </form>

            <div class="list-container">
                <ul class="list">
                    @foreach ($activies as $activy)
                    <li>
                        <form action="{{ route('activy.update',['id'=>$activy->id,'isChecked'=>$activy->checked]) }}" method="post">
                            @csrf
                            @method("put")
                            @if($activy->checked)
                            <button type="submit">
                                <input id='inputcheck-{{$activy->id}}' type="checkbox" name="check" checked>
                            </button>
                            @else
                            <button type="submit">
                                <input id='inputcheck-{{$activy->id}}' type="checkbox" name="check">
                            </button>
                            @endif
                        </form>
                        <span>{{ $activy->title }}</span>
                        <form action="{{ route('activy.destroy',$activy->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn-danger">Deletar</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>

</body>

</html>