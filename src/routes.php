<?php
Route::post('/fileupload/upload',[\Erendi\Fileuploader\FileuploaderController::class, 'upload_data'])->name('fileupload.upload');
Route::post('/fileupload/unupload',[\Erendi\Fileuploader\FileuploaderController::class, 'delete_data'])->name('fileupload.unupload');
