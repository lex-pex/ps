<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\MenuAd;
use App\Models\Part;
use App\Models\Category;
use App\Assist\Processor;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Rubric;
use App\Http\Controllers\Controller;

class EditController extends Controller{

    // PART Edit
    public function partEdit($id) {
        if(!$item = Part::find($id)) return abort(404);
        $type = 'part';
        $path = ['Admin Pane' => 'admin', 'Part List' => 'admin/parts', $type . ' : '. $item->name => 'admin/' . $type . '/edit/' . $id];
        return $this->form($type, 'none', null, $path, $item);
    }
    // Part Store
    public function partStore(Request $request, Part $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'NONE', 'part');
        return $this->preview('part', 'NONE', 'NONE', $item);
    }

    // CATEGORY Edit
    public function categoryEdit($id) {
        if(!$item = Category::find($id)) return abort(404);
        $parents = Part::all('id', 'name');
        $type = 'category';
        $path = ['Admin Pane' => 'admin', 'Category List' => 'admin/cats', $type . ' : '. $item->name => 'admin/' . $type . '/edit/' . $id];
        return $this->form($type, 'part', $parents, $path, $item);
    }
    // Category Store
    public function categoryStore(Request $request, Category $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'part', 'cat');
        $pn = $item->part->name;
        return $this->preview('category', 'part', $pn, $item);
    }

    // RUBRIC Edit
    public function rubricEdit($id) {
        if(!$item = Rubric::find($id)) return abort(404);
        $parents = Category::all('id', 'name');
        $type = 'rubric';
        $path = ['Admin Pane' => 'admin', 'Rubrics List' => 'admin/rubrics', $type . ' : '. $item->name => 'admin/' . $type . '/edit/' . $id];
        return $this->form($type, 'category', $parents, $path, $item);
    }
    // Rubric Store
    public function rubricStore(Request $request, Rubric $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'category', 'rub');
        $p = $item->category;
        return $this->preview('rubric', 'category', $p->name, $item);
    }

    // LESSON Edit
    public function lessonEdit($id) {
        if(!$item = Lesson::find($id)) return abort(404);
        $parents = Rubric::all('id', 'name');
        $path = ['Admin Pane' => 'admin', 'Lessons List' => 'admin/lessons', 'Lesson #'.$id.' Edit' => 'admin/lesson/edit/' . $id];
        return $this->form('lesson', 'rubric', $parents, $path, $item);
    }
    // Lesson Store
    public function lessonStore(Request $request, Lesson $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'rubric','les');
        $p = $item->rubric;
        return $this->preview('lesson', 'rubric', $p->name, $item);
    }

    // AD Edit
    public function adEdit($id) {
        if(!$item = Ad::find($id)) return abort(404);
        $path = ['Admin Pane' => 'admin', 'Ads List' => 'admin/ads', 'Ad #'.$id.' Edit' => 'admin/ad/edit/' . $id];
        return $this->form('ad', 'ad', null, $path, $item);
    }
    // Ad Store
    public function adStore(Request $request, Ad $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'ad','ad');
        return $this->preview('ad', 'ad', 'ad', $item);
    }

    // MENU_AD Edit
    public function menuAdEdit($id) {
        if(!$item = MenuAd::find($id)) return abort(404);
        $path = ['Admin Pane' => 'admin', 'MenuAds List' => 'admin/menu_ads', 'Ad #'.$id.' Edit' => 'admin/menu_ad/edit/' . $id];
        return $this->form('menu_ad', 'menu_ad', null, $path, $item);
    }
    // Menu_Ad Store
    public function menuAdStore(Request $request, MenuAd $item) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Processor::itemUpdate($request, $item, 'mad','mad');
        return $this->preview('menu_ad', 'ad', 'ad', $item);
    }

    // View Form
    private function form($type, $parentType, $parents, $path, $item) {
        return view('admin.item.edit', [
            'type' => $type,
            'parentType' => $parentType,
            'parents' => $parents,
            'item' => $item,
            'path' => $path,
        ])->withTitle(ucfirst($type) . ' Edit');
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
