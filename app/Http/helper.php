<?php


if (!function_exists('upload')) {
    function upload($model, $request, $input = "")
    {
        $file = $request->file($input);
        $file_name = "IMG" . time() . $file->getClientOriginalName();
        $file->move('uploads/', $file_name);
        $model->$input = $file_name;
        $model->save();
    }
}
