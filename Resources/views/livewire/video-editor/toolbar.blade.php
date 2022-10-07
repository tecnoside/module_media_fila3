<div>
    @push('modals')
        <livewire:modal.body-view id="chooseClipTag" title="scegli tag" subtitle="" bodyView="media::modal.add_customer" />
        {{--
        <livewire:modal.body-view.clip-merge id="mergeClips" title="unisci clips." subtitle=""
            bodyView="media::modal.merge_clips" />
        --}}
    @endpush
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <button class="btn btn-primary play-full" data-toggle="tooltip" title="play">
            <i class="fa fa-play mr-2"></i>
        </button>
        <button class="btn btn-primary play-slider" data-toggle="tooltip" title="play slider">
            <i class="fas fa-play-circle mr-2"></i>
        </button>
        <button class="btn btn-primary " id="save-video" data-toggle="tooltip" title="save">
            <i class="fa fa-save mr-2"></i>
        </button>
        {{-- <button class="btn btn-primary editor-btn" id="get-snap" style="width: 33%">
		<i class="fa fa-camera mr-2"></i>Snap
		</button> --}}
        <button class="btn btn-primary " wire:click="exportFrame" data-toggle="tooltip" title="snap">
            <i class="fa fa-camera mr-2"></i>
        </button>
        {{-- <a id="downlink" style="display:none;" download="screenshot"> </a> --}}
        <button class="btn btn-primary" id="cut-video" wire:click="exportClip" data-toggle="tooltip" title="cut-video">
            <i class="fa fa-cut mr-2"></i>
        </button>
        {{-- <button wire:click="mergeEpisodes"
		class="btn btn-primary editor-btn {{ count($episodes) > 0 ? '' : 'cursor-no-drop' }}"
		id="merge-video" {{ count($episodes) > 0 ? '' : 'disabled' }} style="width: 33%">
		<i class="fa fa-compress mr-2"></i>Merge
		</button> --}}
        <input type="text" wire:model="currentTime" class="form-control" />
        <input type="text" wire:model="rangeFrom" class="form-control" />
        <input type="text" wire:model="rangeTo" class="form-control" />
    </div>
    <div>
        {{--
        Current time: {{ now() }} <br />
        --}}
        <h3 wire:click="$refresh">{{ $snaps->count() }} Snaps</h3>
        <div class="row">
            {{--  --}}
            @foreach ($snaps as $sk => $snap)
                <x-card type='image'>
                    <x-slot name="img_src">{{ $snap->getUrl() }}</x-slot>
                    <x-slot name="txt">
                        <div class="card-img-overlay-top text-end">
                            <div class="btn btn-danger" wire:click="deleteSnap({{ $snap->id }})">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div wire:loading wire:target="setPoster">
                            <x-spinner />
                        </div>
                        @if ($snap->getCustomProperty('isPoster', false))
                            <br />isPoster
                        @else
                            <div class="btn btn-primary" wire:click="setPoster({{ $snap->id }})">
                                <i class="fas fa-check"></i>
                            </div>
                        @endif
                    </x-slot>
                </x-card>
            @endforeach
        </div>
        <h3 wire:click="$refresh">{{ $clips->count() }} Clips</h3>
        <div class="row">
            @foreach ($clips as $sk => $clip)
                <x-card type='video'>
                    <x-slot name="videoSrc">{{ $clip->video_url }}</x-slot>
                    <x-slot name="title">
                    </x-slot>
                    <x-slot name="txt">
                        <div class="card-img-overlay-top text-end">
                            <div class="btn btn-danger" wire:click="deleteClip({{ $clip->id }})">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        @if ($clip->getCustomProperty('time_from', null))
                            range: {{ gmdate('H:i:s', $clip->getCustomProperty('time_from', null)) }} -
                            {{ gmdate('H:i:s', $clip->getCustomProperty('time_to', null)) }}
                        @endif
                        @php
                            $tag_type = 'customers';
                            //$clip->attachTags(['tag 2', 'tag 3'],$tag_type);
                            $customers = $clip->tagsWithType($tag_type);
                            //dddx($customers);
                        @endphp
                        <h4>{{ $customers->count() }} Customers <small><button class="btn btn-primary"
                                    wire:click="chooseClipTag({{ $clip->id }})"><i
                                        class="fas fa-plus"></i></button></small></h4>
                        @foreach ($customers as $v)
                            {{ $v->name }}
                        @endforeach
                        merge ? <input type="checkbox" wire:model="form_data.clip_merge.{{ $clip->id }}"
                            class="form-checkbox" />
                    </x-slot>
                </x-card>
            @endforeach
            <button class="btn btn-primary" wire:click="clickMerge()">Clip Merge !</button>
        </div>
    </div>
</div>
