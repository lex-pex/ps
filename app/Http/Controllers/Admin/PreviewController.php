<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\MenuAd;
use App\Models\Part;
use App\Models\Category;
use App\Models\Rubric;
use App\Models\Lesson;
use App\Models\Ad;

class PreviewController extends Controller
{
    public function partPreview($id) {
        if(!$item = Part::find($id)) return abort(404);
        return $this->preview('part', 'NONE', 'NONE', $item);
    }
    public function categoryPreview($id) {
        if(!$item = Category::find($id)) return abort(404);
        $p = $item->part;
        return $this->preview('category', 'part', $p->name, $item);
    }
    public function rubricPreview($id) {
        if(!$item = Rubric::find($id)) return abort(404);
        $p = $item->category;
        return $this->preview('rubric', 'category', $p->name, $item);
    }
    public function lessonPreview($id) {
        if(!$item = Lesson::find($id)) return abort(404);
        $p = $item->rubric;
        return $this->preview('lesson', 'rubric', $p->name, $item);
    }
    public function adPreview($id) {
        if(!$item = Ad::find($id)) return abort(404);
        $p = 'Advertising';
        return $this->preview('ad', 'none', $p, $item);
    }
    public function menuAdPreview($id) {
        if(!$item = MenuAd::find($id)) return abort(404);
        $p = 'Menu Advertising';
        return $this->preview('menu_ad', 'none', $p, $item);
    }
    public function readFeedback($id){
        $item = Feedback::find($id);
        $item->status = 1;
        $item->save();
        return view('admin.feedback.read', [
            'item' => $item
        ])->withTitle('Read Message');
    }

    // View Preview
    private function preview($type, $parentType, $parentName, $item) {
        return view('admin.item.preview', [
            'type' => $type,
            'parentType' => $parentType,
            'parentName' => $parentName,
            'item' => $item
        ])->withTitle(ucfirst($type) . ' Preview');
    }
}
