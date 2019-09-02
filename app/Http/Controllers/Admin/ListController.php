<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Lesson;
use App\Models\MenuAd;
use App\Models\Part;
use App\Models\Rubric;
use App\Models\Ad;

class ListController extends Controller
{

    public function pane() {
        return view('admin.pane', [
            'path' => ['Admin Pane' => 'admin']
        ])->withTitle('Admin Pane');
    }

    public function feedback() {
        $items = Feedback::all()->sortByDesc('created_at');
        return view('admin.feedback.list', [
            'parent' => 'Feedback',
            'type' => 'feedback',
            'items' => $items,
        ])->withTitle('Message List');
    }

    public function partsList() {
        $items = Part::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'NONE',
            'type' => 'part',
            'items' => $items,
        ])->withTitle('Parts List');
    }

    public function catsList() {
        $items = Category::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'part',
            'type' => 'category',
            'items' => $items,
        ])->withTitle('Categories List');
    }

    public function rubricsList() {
        $items = Rubric::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'category',
            'type' => 'rubric',
            'items' => $items,
        ])->withTitle('Rubrics List');
    }

    public function lessonsList() {
        $items = Lesson::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'rubric',
            'type' => 'lesson',
            'items' => $items,
            'path' => ['Admin Pane' => 'admin', 'Lessons List' => 'admin/lessons']
        ])->withTitle('Lessons List');
    }

    public function adsList() {
        $items = Ad::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'none',
            'type' => 'ad',
            'items' => $items,
        ])->withTitle('Ads List');
    }

    public function menuAdsList() {
        $items = MenuAd::all()->sortBy('sort_order');
        return view('admin.item.list', [
            'parent' => 'none',
            'type' => 'menu_ad',
            'items' => $items,
        ])->withTitle('Menu Ads List');
    }

}



























