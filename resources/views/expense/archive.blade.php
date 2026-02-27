<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('employee.index') }}">index</a>
    <a href="{{ route('employee.archive') }}">Archive</a>
    @forelse ($employees as $employee)
        <p>{{ $employee->first_name }}</p>
        <form action="{{ route('employee.restore',$employee) }}" method="post">
            @csrf
            <button type="submit">Restore</button>
        </form>
        <form action="{{ route('employee.destroy',$employee) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">force delete</button>
        </form>
    @empty
        <p>empty</p>
    @endforelse
</body>
</html>