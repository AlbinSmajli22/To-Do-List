<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;

trait Storable
{
    public function scopeMakeStore($query, Request $request, $jsonColumn = null)
    {
        if (!$this->fillable) {
            throw new Exception("Please define your fillable properties!");
        }

        $fillableProps = $this->fillable;
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

        $model = new static($data);
        $model->save();
        return $model;
    }
}
