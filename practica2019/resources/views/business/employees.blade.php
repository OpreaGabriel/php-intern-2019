<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Employees</h1>
    <ul>
        @foreach ($employees as $employee)
            @if (Session('id') == $employee->id)
                <form action="/employees/{{ $employee->id }}/update" method="post">
                @csrf
                    <input type="text" name="name" value="{{ $employee->name }}">
                    <select name="company_id" id="">
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}" @if($employee->company_id == $company->id) {{ "selected" }} @endif>{{$company->name}}</option>
                            @endforeach
                    </select>
                    <button type="submit">Save</button>
                </form>
            @else
                <li>
                    {{$employee['name']}} - {{$employee['company_name']}}
                    <form method="get" action="/employees/{{ $employee->id }}/edit">
                        <button type="submit">Edit</button>
                    </form>
                    <form method="post" action="/employees/{{ $employee->id }}/delete">
                    @csrf
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endif
            
        @endforeach
    </ul>

<form action="/employees" method="post">
    {{ csrf_field() }}
    <label for="">name</label>
    <input type="text" name="name">
    
    <label for="">company</label>
    <select name="company_id" id="">
        @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
    </select>
    
    <input type="submit" value="Add">
</form>



</body>
</html>