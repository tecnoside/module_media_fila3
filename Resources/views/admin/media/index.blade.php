@extends('adm_theme::layouts.app')
@section('content')
    <x-media.index
    name="images"
    :model="$_panel->getParent()->row"
    collection="images" 
    />
@endsection