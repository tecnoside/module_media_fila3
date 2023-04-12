<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $order = 1;
        foreach ($this->upload ?? [] as $attachment) {
            ++$order;
=======
    public function submit() {
<<<<<<< HEAD
        // *
        // $t1=$this->model
        // ->addFromMediaLibraryRequest($this->upload)
        // ->toMediaCollection($this->collection);
        // ->toMediaCollectionFromTemporaryUpload($this->collection,'',)
        // $collectionName, $diskName, $this->fileName)

        // */

        // dddx(collect($this->upload)->pluck('order')->all());
        foreach ($this->upload as $attachment) {
>>>>>>> a573407 (up)
=======
        $order=1;
        foreach ($this->upload ?? [] as  $attachment) {
            $order++;
>>>>>>> 7303911 (up)
            $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($attachment['uuid']);
            if (null != $temporaryUpload) {
<<<<<<< HEAD
<<<<<<< HEAD
                // $media = $temporaryUpload->getFirstMedia();
<<<<<<< HEAD
                $media = $temporaryUpload->moveMedia($this->model, $this->collection, '', $attachment['fileName']);
            // dddx($res);
            // $media->move($this->model, $this->collection);
            } else {
                $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
                // $media->update(['order_column'=>$order]);
                // dddx(['media'=>$media,'order'=>$order]);
=======
                //$media = $temporaryUpload->getFirstMedia();
=======
                // $media = $temporaryUpload->getFirstMedia();
>>>>>>> 931017b (Fix styling)
                $temporaryUpload->moveMedia($this->model, $this->collection, '', $attachment['fileName']);
            // $media->move($this->model, $this->collection);
            } else {
<<<<<<< HEAD
                //$media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
>>>>>>> a573407 (up)
=======
                // $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
>>>>>>> 931017b (Fix styling)
            }
            $media?->update(['order_column' => $order]);
        }
        session()->flash('message', 'Post successfully updated.');
<<<<<<< HEAD
=======
        // $order=collect($this->upload)->pluck('order')->all();
        // \Modules\Media\Models\Media::setNewOrder($order);

        // dddx($attachment);
        /*
        "name" => "b075a80d5f84d61ccfc0c2414063b44b.jpg"
        "fileName" => "b075a80d5f84d61ccfc0c2414063b44b.jpg"
        "oldUuid" => "d717a318-2abe-4ec0-ac4f-c7df4efb2e11"
        "uuid" => "129eabc3-4b7b-4132-a072-bc748152b576"
        "previewUrl" => "/media/7/conversions/b075a80d5f84d61ccfc0c2414063b44b-preview.jpg"
        "order" => 1
        "size" => 80973
        "mime_type" => "image/jpeg"
        "extension" => "jpg"
        */
        // $temporaryUpload = $temporaryUploadModelClass::findByMediaUuidInCurrentSession($uuid)

        // }
>>>>>>> a573407 (up)
=======
                $media=$temporaryUpload->moveMedia($this->model, $this->collection, '', $attachment['fileName']);
                //dddx($res);
            // $media->move($this->model, $this->collection);
            } else {
                $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
                //$media->update(['order_column'=>$order]);
                //dddx(['media'=>$media,'order'=>$order]);
            }
            $media?->update(['order_column'=>$order]);

        }
        session()->flash('message', 'Post successfully updated.');

>>>>>>> 7303911 (up)
    }

    public function submitVecio()
    {
        foreach ($this->upload as $attachment) {
            $disk = config('media-library.disk_name');
            $disk_url = Storage::disk($disk)->url('');
            $n = Str::between(str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $attachment['previewUrl']), str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $disk_url), DIRECTORY_SEPARATOR.'conversions');

            $path = Storage::disk($disk)->path($n.DIRECTORY_SEPARATOR.$attachment['fileName']);
            // dddx([
            //     'attachment' => $attachment,
            //     '$attachment previewUrl' => $attachment['previewUrl'],
            //     'n' => $n,
            //     'path' => $path,
            //     'this collection' => $this->collection,
            //     'model' => $this->model,
            // ]);
            // $url = storage_path('app/public'.Str::between($attachment['previewUrl'], 'storage', 'conversions').$attachment['name']);
            // $url = $disk['previewUrl']
            $this->model
                ->addMedia($path)
                ->toMediaCollection($this->collection);
        }

        session()->flash('message', 'Post successfully updated.');
<<<<<<< HEAD
        // *
=======
         // *
>>>>>>> 7303911 (up)
        // $t1=$this->model
        // ->addFromMediaLibraryRequest($this->upload)
        // ->toMediaCollection($this->collection);
        // ->toMediaCollectionFromTemporaryUpload($this->collection,'',)
        // $collectionName, $diskName, $this->fileName)

        // */

        // dddx(collect($this->upload)->pluck('order')->all());
<<<<<<< HEAD
        // $media->setOrder($attachment['order']);

        /* @var \Spatie\MediaLibrary\MediaCollections\FileAdder $fileAdder */
        /*
        $fileAdder = app(\Spatie\MediaLibrary\MediaCollections\FileAdder::class);
        $fa=$fileAdder
            ->setSubject($this->model)
            ->setFile($temporaryUpload)
            ->setName($attachment['name'])
            ->setOrder($attachment['order']);
        dddx($fa);
        */
=======
            // $media->setOrder($attachment['order']);

            /* @var \Spatie\MediaLibrary\MediaCollections\FileAdder $fileAdder */
            /*
            $fileAdder = app(\Spatie\MediaLibrary\MediaCollections\FileAdder::class);
            $fa=$fileAdder
                ->setSubject($this->model)
                ->setFile($temporaryUpload)
                ->setName($attachment['name'])
                ->setOrder($attachment['order']);
            dddx($fa);
            */
>>>>>>> 7303911 (up)
        // $order=collect($this->upload)->pluck('order')->all();
        // \Modules\Media\Models\Media::setNewOrder($order);

        // dddx($attachment);
        /*
        "name" => "b075a80d5f84d61ccfc0c2414063b44b.jpg"
        "fileName" => "b075a80d5f84d61ccfc0c2414063b44b.jpg"
        "oldUuid" => "d717a318-2abe-4ec0-ac4f-c7df4efb2e11"
        "uuid" => "129eabc3-4b7b-4132-a072-bc748152b576"
        "previewUrl" => "/media/7/conversions/b075a80d5f84d61ccfc0c2414063b44b-preview.jpg"
        "order" => 1
        "size" => 80973
        "mime_type" => "image/jpeg"
        "extension" => "jpg"
        */
        // $temporaryUpload = $temporaryUploadModelClass::findByMediaUuidInCurrentSession($uuid)

        // }
    }

    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }
}
