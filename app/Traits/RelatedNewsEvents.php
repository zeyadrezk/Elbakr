<?php

namespace App\Traits;

use App\Models\Event;
use App\Models\News;


trait  RelatedNewsEvents
{


    public function getRelatedNewsByCategoryId($categoryId, $currentNewsId, $limit = 4)
    {
        $desiredLang = app()->getLocale();
        $today = today();

        return self::with('category')
            ->where('id', '!=', $currentNewsId)
            ->where('date', '>', $today)
            ->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })
            ->orderBy('date', 'desc')
            ->paginate($limit)
            ->map(function ($item) use ($desiredLang) {
                $category = null;
                if ($item->category) {
                    $categoryNameJson = $item->category->name[$desiredLang] ?? null;
                    $category = [
                        'id' => $item->category->id,
                        'name' => $categoryNameJson,
                    ];
                }

                return  [
                    'id' => $item->id,
                    'title' => $item->title[$desiredLang] ?? null,
                    'description' => $item->description[$desiredLang] ?? null,
                    'image' => $item->image ?? null,
                    'date' => $item->date,
                    'type' => $item->type ?? null,
                    'category' => $category,
                    'user_id' => $item->user_id,
                    'video' => $item->video ?? null,
                    'details' => $item->details[$desiredLang] ?? null,
                    'main_image' => $item->main_image ?? null,
                    'user' => $item->user ?? null,
                ];
            });
    }


    public function getRelatedNewsByCategoryId2($categoryId, $currentNewsId, $limit = 4)
    {
        $desiredLang = app()->getLocale();
        $today = today();

        return self::with('category')
            ->where('id', '!=', $currentNewsId)
            ->where('date', '<', $today)
            ->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })
            ->orderBy('date', 'desc')
            ->paginate($limit)
            ->map(function ($item) use ($desiredLang) {
                $category = null;
                if ($item->category) {
                    $categoryNameJson = $item->category->name[$desiredLang] ?? null;
                    $category = [
                        'id' => $item->category->id,
                        'name' => $categoryNameJson,
                    ];
                }

                return  [
                    'id' => $item->id,
                    'title' => $item->title[$desiredLang] ?? null,
                    'description' => $item->description[$desiredLang] ?? null,
                    'image' => $item->image ?? null,
                    'date' => $item->date,
                    'type' => $item->type ?? null,
                    'category' => $category,
                    'user_id' => $item->user_id,
                    'video' => $item->video ?? null,
                    'details' => $item->details[$desiredLang] ?? null,
                    'main_image' => $item->main_image ?? null,
                    'user' => $item->user ?? null,
                ];
            });
    }








}
