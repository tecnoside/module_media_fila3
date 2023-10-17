<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Modules\Media\Models\Media;
use Modules\Media\Models\TemporaryUpload;
use Modules\Media\Request\UploadRequest;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Throwable;
>>>>>>> 49d7c0c (first)
=======
use Throwable;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use Throwable;
>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use Throwable;
>>>>>>> ca4973d (Dusting)
=======
>>>>>>> 93f1e9f (Check & fix styling)

class MediaLibraryUploadController
{
    public function __invoke(UploadRequest $uploadRequest)
    {
        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        try {
            $temporaryUpload = $temporaryUploadModelClass::createForFile(
                $uploadRequest->file,
                session()->getId(),
                $uploadRequest->uuid,
                $uploadRequest->name ?? '',
            );
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (\Throwable $exception) {
=======
        } catch (Throwable $exception) {
>>>>>>> 49d7c0c (first)
=======
        } catch (Throwable $exception) {
>>>>>>> master
=======
        } catch (\Throwable $exception) {
>>>>>>> ed2c51e (Check & fix styling)
=======
        } catch (Throwable $exception) {
>>>>>>> 0d0c96c (Dusting)
=======
        } catch (\Throwable $exception) {
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        } catch (Throwable $exception) {
>>>>>>> ca4973d (Dusting)
=======
        } catch (\Throwable $exception) {
>>>>>>> 93f1e9f (Check & fix styling)
            $temporaryUploadModelClass::query()
                ->where('session_id', session()->getId())
                ->get()->each->delete();

            report($exception);

            throw ValidationException::withMessages(['file' => 'Could not handle upload. Make sure you are uploading a valid file.']);
        }

        /** @var Media $media */
        $media = $temporaryUpload->getFirstMedia();

        return response()->json($this->responseFields($media, $temporaryUpload));
    }

    protected function responseFields(Media $media, TemporaryUpload $temporaryUpload): array
    {
        return [
            'uuid' => $media->uuid,
            'name' => $media->name,
            'preview_url' => config('media-library.generate_thumbnails_for_temporary_uploads')
                ? $temporaryUpload->getFirstMediaUrl('default', 'preview')
                : '',
            'size' => $media->size,
            'mime_type' => $media->mime_type,
            'extension' => $media->extension,
        ];
    }
}
