<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;

class PathController extends Controller
{
    private $initialLink = 'admin/path';

    public function path()
    {
        if (!$parts = Part::all()) return abort(404);
        $currentLink = $this->initialLink;
        return view('admin.path', [
            'type' => 'part',
            'items' => $parts->sortBy('sort_order'),
            'currentLink' => $currentLink,
            'path' => ['Admin Pane' => 'admin', 'Path' => $currentLink]
        ])->withTitle('Path : Parts');
    }

    public function part($part)
    {
        if (!$part = Part::where('alias', $part)->first()) return abort(404);
        $currentLink = $this->initialLink . '/' . $part->alias;
        return view('admin.path', [
            'type' => 'category',
            'currentLink' => $currentLink,
            'items' => $part->categories->sortBy('sort_order'),
            'path' => ['Admin Pane' => 'admin', 'Path' => $this->initialLink, $part->name => $currentLink]
        ])->withTitle('Paths > Part : Categories');
    }

    public function category($part, $category)
    {
        if (!$part = Part::where('alias', $part)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        $prevLink = $this->initialLink . '/' . $part->alias;
        $currentLink = $prevLink . '/' . $cat->alias;
        return view('admin.path', [
            'type' => 'rubric',
            'currentLink' => $currentLink,
            'items' => $cat->rubrics->sortBy('sort_order'),
            'path' => ['Admin Pane' => 'admin', 'Path' => $this->initialLink, $part->name => $prevLink, $cat->name => $currentLink]
        ])->withTitle('Paths > Part > Category : Rubrics');
    }

    public function rubric($part, $category, $rubric)
    {
        if (!$part = Part::where('alias', $part)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        if (!$rubric = $cat->rubrics->where('alias', $rubric)->first()) return abort(404);
        $prevLink = $this->initialLink . '/' . $part->alias . '/' . $cat->alias;
        $currentLink = $prevLink . '/' . $rubric->alias;
        return view('admin.path', [
            'type' => 'lesson',
            'currentLink' => $currentLink,
            'items' => $rubric->lessons->sortBy('sort_order'),
            'path' => [
                'Admin Pane' => 'admin',
                'Path' => $this->initialLink,
                $part->name => $this->initialLink . '/' . $part->alias,
                $cat->name => $prevLink,
                $rubric->name => $currentLink
            ]
        ])->withTitle('Paths > Part > Category > Rubric : Lessons');
    }

    public function lesson($part, $category, $rubric, $lesson)
    {
        if (!$part = Part::where('alias', $part)->first()) return abort(404);
        if (!$cat = $part->categories->where('alias', $category)->first()) return abort(404);
        if (!$rubric = $cat->rubrics->where('alias', $rubric)->first()) return abort(404);
        if (!$lesson = $rubric->lessons->where('alias', $lesson)->first()) return abort(404);
        $prevLink = $this->initialLink . '/' . $part->alias . '/' . $cat->alias . '/' . $rubric->alias;
        $currentLink = $prevLink . '/' . $lesson->alias;
        return view('admin.item.preview', [
            'type' => 'lesson',
            'item' => $lesson,
            'parentType' => 'rubric',
            'parentName' => $rubric->name,
//            'currentLink' => $currentLink,
//            'path' => [
//                'Admin Pane' => 'admin',
//                'Path' => $this->initialLink,
//                $part->name => $this->initialLink . '/' . $part->alias,
//                $cat->name => $this->initialLink . '/' . $part->alias . '/' . $cat->alias,
//                $rubric->name => $prevLink,
//                $lesson->name => $currentLink
//            ]
        ])->withTitle('Paths > Part > Category > Rubric > Lesson');
    }
}