<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait Updatable
{
    public function scopeMakeUpdate($query, Request $request, $id, $jsonColumn = null)
    {
        $model = $this->findOrFail($id);

        if (!$model->fillable) {
            throw new Exception("Please define your fillable properties!");
        }

        $fillableProps = $model->fillable;
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (in_array($key, $fillableProps)) {
                if ($jsonColumn && $key === $jsonColumn) {
                    $data[$key] = json_encode($value);
                } else {
                    $data[$key] = $value;
                }
            }
        }

        $model->fill($data);
        $model->save();
        return $model;
    }
    

}
