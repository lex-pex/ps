<?php

namespace App\Assist;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Rubric;
use App\Models\Part;
use Illuminate\Http\Request;

class Processor{

    private static $_IMG_STORAGE = '/img/up/';

    public static function itemDelete($item, $img_folder) {
        $imageDirectory = self::$_IMG_STORAGE . $img_folder . '/' . $item->id;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imageDirectory)){
            self::delTree($_SERVER['DOCUMENT_ROOT'] . $imageDirectory);
        }
        $item->delete();
    }

    public static function itemInsert(Request $request, $item, $parentType, string $img_folder) {
        $item->name = '';
        $item->alias = '___';
        self::itemUpdate($request, $item, $parentType, $img_folder);
    }

    /**
     * Item / Lesson Updater
     */
    public static function itemUpdate(Request $request, $item, $parentType, string $img_folder) {
        $data = $request->except('image', 'del_img', 'alias', 'hidden', '_token', 'parent_id');

        if($request->parent_id)
            $item->setAttribute($parentType . '_id', $request->parent_id);

        if($parentType === 'ad' || $parentType === 'mad') {
            $item->setAttribute('alias', $request->alias);
            $alias = self::aliasProcessor($request->name);
        } elseif($alias = $request->get('alias')) {
            $alias = Processor::aliasUpdate($request->alias, $item->alias, $parentType);
            $item->alias = $alias;
        }
        $del_img = $request->get('del_img');
        $item->save();
        $id = $item->id;
        $img_storage = self::$_IMG_STORAGE . $img_folder . '/';
        if ($del_img) {
            $item->image = '';
            $imageDirectory = $img_storage . $id;
            Processor::delDir($imageDirectory);
        }
        if (is_uploaded_file($_FILES['image']['tmp_name'])){
            $imageDirectory = $img_storage . $id;
            Processor::delDir($imageDirectory);
            $fileName = $_FILES['image']['name'];
            $array = explode('.', $fileName);
            $extension = trim(array_pop($array));
            $imagePath = $imageDirectory . "/{$alias}." . $extension;
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $imageDirectory)){
                mkdir($_SERVER['DOCUMENT_ROOT'] . $imageDirectory);
            }
            move_uploaded_file($_FILES['image']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT'] . $imagePath
            );
            $item->image = $imagePath;
        }
        $item->fill($data);
        $item->save();
    }

    public static function aliasUpdate(string $alias, string $native, $parentType){
        if($alias == $native){
            return $alias;
        }
        $alias = self::aliasProcessor($alias);
        return self::aliasUnique($alias, $parentType);
    }

    // private methods

    private static function textProcessor(string $text){
        $lines = trim(preg_replace('/[\n\r]{2,}/', "\n", $text));
        return trim(preg_replace('/\s{3,}/', ' ', $lines));
    }

    public static function delDir($directory){
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $directory)){
            self::delTree($_SERVER['DOCUMENT_ROOT'] . $directory);
        }
    }

    private static function delTree($dir){
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    // Alias Processing
    private static function aliasProcessor(string $text){
        $symbols = trim(preg_replace('/[\n\r]{2,}/', "\n", $text));

        $wordsArray = explode(' ', $symbols);
        $wordsArray = array_slice($wordsArray, 0, 5);
        $symbols = implode(' ', $wordsArray);

        $symbols = mb_strtolower($symbols);
        $str = $symbols;
        $len = mb_strlen($str);
        $chars = array();
        for ($k = 0; $k < $len; $k++){
            $chars[] = mb_substr($str, $k, 1);
        }
        $result = '';
        for ($i = 0; $i < count($chars); $i ++){
            $result .= self::changeSymbol($chars[$i]);
        }
        return $result;
    }

    private static function changeSymbol($symbol){
        $map = [' ' => '_','а' => 'a','б' => 'b','в' => 'v','г' =>'g','д' => 'd','е' => 'e','ё' => 'yo','.'=>'','%'=>'pc','='=>'',
            'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'j', 'і' => 'i', 'ї' => 'j', 'к' => 'k','л' => 'l',
            'м' => 'm','н' => 'n','о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch','ш' => 'sh', 'щ' => 'shch', 'ъ' => '','ы' => 'y',
            'ь' => '', 'э' => 'e', 'ю' => 'yu','я' => 'ya','?' => '','!' => '', '/' => '', '\\' => '', ',' => '','"' => '', "'" => ''];
        return array_key_exists($symbol, $map) ? $map[$symbol] : $symbol;
    }

    private static function aliasUnique($alias, $parentType){
        $result = $alias;
        if($parentType == 'NONE')
            while (Part::where('alias', $result)->exists())
                $result .= 'I';
        if($parentType == 'part')
            while (Category::where('alias', $result)->exists())
                $result .= 'I';
        if($parentType == 'category')
            while (Rubric::where('alias', $result)->exists())
                $result .= 'I';
        if($parentType == 'rubric')
            while (Lesson::where('alias', $result)->exists())
                $result .= 'I';
        return $result;
    }
}

