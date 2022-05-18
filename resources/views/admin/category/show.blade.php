@extends('admin.admin')

@section('content')
    <table>
        <tr>
            <th>Category</th>
            <th>Sub Category</th>
        </tr>
        <tr>
            <td>{{$category->title}}</td>
            <td></td>
        </tr>
    </table>
@endsection