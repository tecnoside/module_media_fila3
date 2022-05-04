@extends('adm_theme::layouts.app')
@section('content')
    <livewire:media::video-editor-sub :src="$mp4_src" :srt="$srt_src" />
@endsection
