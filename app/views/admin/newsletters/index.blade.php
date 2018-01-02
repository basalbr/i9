@extends('admin.layouts.admin-layout')
@section('content')
<div class="widget">
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable" id="res1">
        <thead>
            <tr>
                <td class="sortCol"><div>ID<span></span></div></td>
                <td class="sortCol"><div>E-mail<span></span></div></td>
                
            </tr>
        </thead>
        <tbody>
            @if(!$newsletters->isEmpty())
            @foreach ($newsletters as $newsletter)
            <tr>
                <td>{{ $newsletter->id }}</td>
                <td>{{ $newsletter->email }}</td>
            </tr>
            @endforeach
            @endif

        </tbody>
        
    </table>
    
</div>
{{$newsletters->links()}}
@stop