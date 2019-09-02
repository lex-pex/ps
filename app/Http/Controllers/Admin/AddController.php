<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\MenuAd;
use App\Models\Part;
use App\Models\Rubric;
use App\Models\Lesson;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assist\Processor;

class AddController extends Controller
{

    public function add($type) {
        if($type === 'part') return $this->partForm($type);
        if($type === 'category') return $this->categoryForm($type);
        if($type === 'rubric') return $this->rubricForm($type);
        if($type === 'lesson') return $this->lessonForm($type);
        if($type === 'ad') return $this->adForm($type);
        if($type === 'menu_ad') return $this->menuAdForm($type);
        else dd('There is no such type in AddController@add()');
    }

    public function itemSave(Request $request, $type) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        return $this->itemStore($request, $type);
    }

    private function partForm($type) {
        $parent = null;
        return $this->form($type, $parent);
    }

    private function categoryForm($type) {
        $parent = Part::all('id', 'name');
        return $this->form($type, $parent);
    }

    private function rubricForm($type) {
        $parent = Category::all('id', 'name');
        return $this->form($type, $parent);
    }

    private function lessonForm($type) {
        $parent = Rubric::all('id', 'name');
        return $this->form($type, $parent);
    }

    private function adForm($type) {
        $parent = null;
        return $this->form($type, $parent);
    }

    private function menuAdForm($type) {
        $parent = null;
        return $this->form($type, $parent);
    }

    private function form($type, $parent) {
        return view('admin.item.add', [
            'parent' => $parent,
            'title' => 'Add '. ucfirst($type),
            'type' => $type,
            'path' => [
                'Admin Pane' => 'admin',
                'Admin ' . ucfirst(($type === 'category' ? 'categories' : $type . 's')) => 'admin/' . ($type === 'category' ? 'cats' : $type . 's'),
            ],
        ]);
    }

    private function itemStore(Request $request, string $type) {

        $item = null;
        $folder = 'def';
        $parentType = 'NONE';
        $parentName = 'NONE';

        if($type === 'part'){
            $item = new Part();
            $folder = $type;
        }
        if($type === 'category') {
            $item = new Category();
            $folder = 'cat';
            $parentType = 'part';
            $parentName = Part::find($request->parent_id)->name;
        }
        if($type === 'rubric') {
            $item = new Rubric();
            $folder = 'rub';
            $parentType = 'category';
            $parentName = Category::find($request->parent_id)->name;
        }
        if($type === 'lesson') {
            $item = new Lesson();
            $folder = 'les';
            $parentType = 'rubric';
            $parentName = Rubric::find($request->parent_id)->name;
        }
        if($type === 'ad') {
            $item = new Ad();
            $folder = 'ad';
            $parentType = 'ad';
            $parentName = 'ad';
        }
        if($type === 'menu_ad') {
            $item = new MenuAd();
            $folder = 'mad';
            $parentType = 'mad';
            $parentName = 'mad';
        }
        if($item == null) dd('There is not such type');
        Processor::itemInsert($request, $item, $parentType, $folder);
        return $this->preview($type, $parentType, $parentName, $item);

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





