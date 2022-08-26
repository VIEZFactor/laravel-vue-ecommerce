@extends("layouts.app")

@section('content')
<div>    
    <appbar></appbar>
</div>
<div class="flex justify-center">
    <router-view></router-view>
</div>

@endsection