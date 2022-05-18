@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
        @foreach ($drivers as $k => $v)
<<<<<<< HEAD
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}" active="{{ $driver == $v ? 'active' : '' }}">
=======
            <x-navbar.item href="/admin/theme?_act=test_video_editor&i={{ $k }}"
                active="{{ $driver == $v ? 'active' : '' }}">
>>>>>>> 4757f34 (.)
                {{ $v }}
            </x-navbar.item>
        @endforeach
    </x-navbar>


    <x-col size="12">
<<<<<<< HEAD
        {!! Form::model(new stdClass(), ['url' => Request::fullUrl()]) !!}
=======
        {!! Form::model(new stdClass(),['url'=>Request::fullUrl() ]) !!}
>>>>>>> 4757f34 (.)
        @method('put')
        <x-video-editor :driver="$driver" :mp4Src="$mp4_src"></x-video-editor>
        <input type="submit" value="go!">
        </form>
    </x-col>
@endsection
