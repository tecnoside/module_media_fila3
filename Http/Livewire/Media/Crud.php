<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Traits\WithMedia;

class Crud extends Component
{
    use WithMedia;

    public $name;

    public $model = null;

    public $mediaComponentNames = ['upload'];

    public $upload;

    public $collection;

    public function mount(string $name, Model $model, string $collection)
    {
        $this->name = $name;
        $this->model = $model;
        $this->collection = $collection;
    }

<<<<<<< HEAD
    public function submit()
    {
=======
    public function submit() {
>>>>>>> 325d64e (.)
        $order = 1;
        foreach ($this->upload ?? [] as $attachment) {
            ++$order;
            $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($attachment['uuid']);
            if (null != $temporaryUpload) {
<<<<<<< HEAD
                // $media = $temporaryUpload->getFirstMedia();
                $media = $temporaryUpload->moveMedia($this->model, $this->collection, '', $attachment['fileName']);
            } else {
                $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
                // $media->update(['order_column'=>$order]);
                // dddx(['media'=>$media,'order'=>$order]);
=======
                $media = $temporaryUpload->moveMedia($this->model, $this->collection, '', $attachment['fileName']);
            } else {
                $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
>>>>>>> 325d64e (.)
            }
            $media?->update(['order_column' => $order]);
        }
        session()->flash('message', 'Post successfully updated.');
    }

<<<<<<< HEAD
    public function render()
    {
=======
    public function submitVecio() {
        foreach ($this->upload as $attachment) {
            $disk = config('media-library.disk_name');
            $disk_url = Storage::disk($disk)->url('');
            $n = Str::between(str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $attachment['previewUrl']), str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $disk_url), DIRECTORY_SEPARATOR.'conversions');

            $path = Storage::disk($disk)->path($n.DIRECTORY_SEPARATOR.$attachment['fileName']);

            $this->model
                ->addMedia($path)
                ->toMediaCollection($this->collection);
        }

        session()->flash('message', 'Post successfully updated.');
    }

    public function render() {
>>>>>>> 325d64e (.)
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }
}
