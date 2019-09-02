<?php

namespace App\Assist;

use App\Assist\Contracts\Menu;
use App\Models\Category;
use App\Models\Part;
use App\Models\Rubric;
use App\Models\Lesson;

class MenuImpl implements Menu {
    public function feed(){
        $menu = [];
        $parts = $this->getParts();
        for($a = 0; $a < count($parts); $a ++) {
            $pathA = $parts[$a]['alias'];
            $menu[$a] = new Item($parts[$a]['name'], $pathA);
            $cats = $this->getCats($parts[$a]['id']);
            for($b = 0; $b < count($cats); $b ++) {
                $pathB = $pathA . '/' . $cats[$b]['alias'];
                $menu[$a]->list[$b] = new Item($cats[$b]['name'], $pathB);
                $rubs = $this->getRubs($cats[$b]['id']);
                for($c = 0; $c < count($rubs); $c ++) {
                    $pathC = $pathB . '/' . $rubs[$c]['alias'];
                    $menu[$a]->list[$b]->list[$c] = new Item($rubs[$c]['name'], $pathC);
                    $pubs = $this->getPubs($rubs[$c]['id']);
                    for($d = 0; $d < count($pubs); $d ++) {
                        $pathD = $pathC . '/' . $pubs[$d]['alias'];
                        $menu[$a]->list[$b]->list[$c]->list[$d] = new Item($pubs[$d]['name'], $pathD);
                    }
                }
            }
        }
        return $menu;
    }

    private function getParts() {
        return Part::select('id', 'name', 'alias')->where('status', 1)->orderBy('sort_order')->get()->toArray();
    }

    private function getCats($id) {
        return Category::select('id', 'name', 'alias')->where('status', 1)->where('part_id', $id)->orderBy('sort_order')->get()->toArray();
    }

    private function getRubs($id) {
        return Rubric::select('id', 'name', 'alias')->where('status', 1)->where('category_id', $id)->orderBy('sort_order')->get()->toArray();
    }

    private function getPubs($id) {
        return Lesson::select('id', 'name', 'alias')->where('status', 1)->where('rubric_id', $id)->orderBy('sort_order')->get()->toArray();
    }
}

//class Item {
//    public $name,$urn,$list;
//    public function __construct($name, $urn, $list = []){
//        $this->name = $name;
//        $this->urn = $urn;
//        $this->list = $list;
//    }
//}
