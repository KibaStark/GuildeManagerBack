<?php
namespace App\Http\Controllers;

use App\Models\Unites;

class UnitesController extends Controller {
    public function index()
    {
        return Unites::get();
    }
    public function getByRarity($element ,$rarity)
    {
        return Unites::where('element', $element)
                    ->where('rarity', $rarity)
                    ->get();
    }

}