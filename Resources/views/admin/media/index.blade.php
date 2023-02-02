@extends('adm_theme::layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <h1>Prova</h1>
    <x-media.index name="images" :model="$_panel->getParent()->row" collection="images" />
@endsection
{{ Theme::add('media::css/media.css') }}
