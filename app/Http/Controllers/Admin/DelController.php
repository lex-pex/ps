<?php

namespace App\Http\Controllers\Admin;

use App\Assist\Processor;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\MenuAd;
use App\Models\Part;
use App\Models\Category;
use App\Models\Rubric;
use App\Models\Lesson;
use App\Models\Feedback;

class DelController extends Controller
{

    public function partDel(Part $item) {
        $items = $item->categories;
        foreach ($items as $i) {
            $i->part_id = 1;
            $i->save();
        }
        Processor::itemDelete($item, 'part');
        return redirect('admin/parts');
    }

    public function categoryDel(Category $item) {
        $items = $item->rubrics;
        foreach ($items as $i) {
            $i->category_id = 1;
            $i->save();
        }
        Processor::itemDelete($item, 'cat');
        return redirect('admin/cats');
    }

    public function rubricDel(Rubric $item) {
        $items = $item->lessons;
        foreach ($items as $i) {
            $i->rubric_id = 1;
            $i->save();
        }
        Processor::itemDelete($item, 'rub');
        return redirect('admin/rubrics');
    }

    public function lessonDel(Lesson $item) {
        Processor::itemDelete($item, 'les');
        return redirect('admin/lessons');
    }

    public function adDel(Ad $item) {
        Processor::itemDelete($item, 'ad');
        return redirect('admin/ads');
    }

    public function menu_adDel(MenuAd $item) {
        Processor::itemDelete($item, 'mad');
        return redirect('admin/menu_ads');
    }

    public function feedbackDel(Feedback $item) {
        $item->delete();
        return redirect('admin/feedback');
    }
}
