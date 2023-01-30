<?php

namespace App\Modules\Json;

use App\Http\Resources\BookResources;
use Illuminate\Support\Arr;

class MergeJsonService
{
    public function merge($files = array())
    {
        $firstArray = [];
        if($firstFile = $files["first"]->get())
        {
            $firstArray = $this->parseFirstFile($firstFile);
        }

        $secondArray = [];
        if($secondFile = $files["second"]->get())
        {
            $secondArray = $this->parseSecondFile($secondFile);
        }

        $joined = Arr::crossJoin($firstArray, $secondArray);
        $mapped = array_map(function ($data) {
            return array_merge($data[0], $data[1]);
        }, $joined);

        return new BookResources($mapped);
    }

    /**
     * Парсинг файла по заданным параметрам
     *
     * @param string $content - содержимое файла
     *
     * @return array распарсенный массив
     */
    private function parseFirstFile(string $content = null): array
    {
        $decoded = json_decode($content, true);
        return $decoded["data"]??[];
    }

    private function parseSecondFile(string $content = null): array
    {
        $decoded = json_decode($content, true);
        return $decoded??[];
    }
}
