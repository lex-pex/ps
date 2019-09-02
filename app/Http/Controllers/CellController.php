<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Category;

class CellController extends Controller
{

    public function part($part)
    {
        if (!$part = Part::where('alias', $part)->where('status', 1)->first()) return abort(404);
        // Prev-Next Links function
        $parts = Part::all()->where('status', 1)->sortBy('sort_order');
        $prev = null;
        $next = null;
        $found = false;
        foreach ($parts as $p) {
            if($found) {
                $next = $p;
                break;
            }
            if ($p->id == $part->id) {
                $found = true;
            } else {
                $prev = $p;
            }
        }
        // Prev-Next Links function
        $path = $part->alias;
        return view('pages.list', [
            'id' => $part->id,
            'type' => 'part',
            'itemsType' => $part->alias == 'java' ? 'Категория' : '',
            'headers' => $this->getItemHeaders($part, $path),
            'group' => $part,
            'items' => $part->categories->where('status', 1)->sortBy('sort_order'),
            'path' => ['Главная' => '', $part->name => $part->alias],
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
        ]);
    }

    public function category($part, $category)
    {
        if (!$part = Part::where('alias', $part)->where('status', 1)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        $path = $part->alias . '/' . $cat->alias;
        // Prev-Next Links function
        $cats = $part->categories->where('status', 1)->sortBy('sort_order');
        $prev = null;
        $next = null;
        $found = false;
        foreach ($cats as $c) {
            if($found) {
                $next = $c;
                break;
            }
            if ($c->id == $cat->id) {
                $found = true;
            } else {
                $prev = $c;
            }
        }
        // Prev-Next Links function
        return view('pages.list', [
            'id' => $cat->id,
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'type' => 'category',
            'itemsType' => 'Рубрика',
            'headers' => $this->getItemHeaders($cat, $path),
            'group' => $cat,
            'items' => $cat->rubrics->where('status', 1)->sortBy('sort_order'),
            'path' => ['Главная' => '',
                $part->name => $part->alias,
                $cat->name => $path
            ]
        ]);
    }

    public function rubric($part, $category, $rubric)
    {
        if (!$part = Part::where('alias', $part)->where('status', 1)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        if (!$rubric = $cat->rubrics->where('alias', $rubric)->first()) return abort(404);
        $path = $part->alias . '/' . $cat->alias . '/' . $rubric->alias;
        // Prev-Next Links function
        $rubrics = $cat->rubrics->where('status', 1)->sortBy('sort_order');
        $prev = null;
        $next = null;
        $found = false;
        foreach ($rubrics as $r) {
            if($found) {
                $next = $r;
                break;
            }
            if ($r->id == $rubric->id) {
                $found = true;
            } else {
                $prev = $r;
            }
        }
        // Prev-Next Links function
        return view('pages.list', [
            'id' => $rubric->id,
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'type' => 'rubric',
            'itemsType' => 'Урок',
            'headers' => $this->getItemHeaders($rubric, $path),
            'group' => $rubric,
            'items' => $rubric->lessons->where('status', 1)->sortBy('sort_order'),
            'path' => ['Главная' => '',
                $part->name => $part->alias,
                $cat->name => $part->alias . '/' . $cat->alias,
                $rubric->name => $path
            ]
        ]);
    }

    public function lesson($part, $category, $rubric, $lesson)
    {
        if (!$part = Part::where('alias', $part)->where('status', 1)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        if (!$rubric = $cat->rubrics->where('alias', $rubric)->first()) return abort(404);
        if (!$lesson = $rubric->lessons->where('alias', $lesson)->first()) return abort(404);
        $path = $part->alias . '/' . $cat->alias . '/' . $rubric->alias . '/' . $lesson->alias;
        // Prev-Next Links function
        $lessons = $rubric->lessons->where('status', 1)->sortBy('sort_order');
        $prev = null;
        $next = null;
        $found = false;
        foreach ($lessons as $l) {
            if($found) {
                $next = $l;
                break;
            }
            if ($l->id == $lesson->id) {
                $found = true;
            } else {
                $prev = $l;
            }
        }
        // Prev-Next Links function
        return view('pages.les', [
            'id' => $lesson->id,
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'type' => 'lesson',
            'headers' => $this->getItemHeaders($lesson, $path),
            'lesson' => $lesson,
            'path' => ['Главная' => '',
                $part->name => $part->alias,
                $cat->name => $part->alias . '/' . $cat->alias,
                $rubric->name => $part->alias . '/' . $cat->alias . '/' . $rubric->alias,
                $lesson->name => $path
            ]
        ]);
    }

    public function getItemHeaders($item, $path = '')
    {
        return [
            'pageTitle' => $item->name . ' | Proger Skill',
            'url' => $path,
            'title' => $item->name,
            'description' => $item->description,
            'image' => $item->image
        ];
    }
}
