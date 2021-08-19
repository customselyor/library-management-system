<?php

namespace App\Http\Controllers;

use App\Models\MicroCategory;
use App\Models\MicroCategoryTranslation;
use App\Models\MicroParentCategoryTranslation;
use App\Models\MicroSubCategory;
use App\Models\MicroSubCategoryTranslation;
use App\Models\Morganism;
use App\Models\MorganismTranslation;
use Illuminate\Http\Request;
use App\Models\MicroParentCategory;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    public function index(Request $request)
    {
        $microParentCategories = MicroParentCategory::active()->get();

        return view('welcome', compact('microParentCategories'));
    }


    public function parent($parent_slug)
    {
        $microParentCategoriesTrans = MicroParentCategoryTranslation::where('slug', '=', $parent_slug)->first();
        if (isset($microParentCategoriesTrans) && $microParentCategoriesTrans->count() > 0) {
            $microParentCategories = MicroParentCategory::find($microParentCategoriesTrans->micro_parent_category_id);

            return view('site.parent', compact('microParentCategories'));
        } else {
            abort(404);
        }
    }

    public function cat($parent_id, $cat)
    {

        $microCategoriesTrans = MorganismTranslation::where('slug', '=', $cat)->first();

        if (isset($microCategoriesTrans) && $microCategoriesTrans->count() > 0) {
            $morganism = Morganism::where('id', '=', $microCategoriesTrans->morganism_id)->firstOrFail();

            return view('site.cat', compact('morganism', 'parent_id'));
        } else {
            abort(404);
        }
    }

    public function sub($parent_id, $cat, $sub)
    {

        $microSubCategoriesTrans = MicroSubCategoryTranslation::where('slug', '=', $sub)->first();
        if (isset($microSubCategoriesTrans) && $microSubCategoriesTrans->count() > 0) {
            $microSubCategories = MicroSubCategory::find($microSubCategoriesTrans->micro_sub_category_id);

            return view('site.sub', compact('microSubCategories', 'parent_id', 'cat'));
        } else {
            abort(404);
        }
    }

    public function child($parent_id, $cat, $child)
    {

        $microCategoriesTrans = MicroSubCategoryTranslation::where('slug', '=', $child)->first();
        if (isset($microCategoriesTrans) && $microCategoriesTrans->count() > 0) {
            $microCategories = MicroCategory::find($microCategoriesTrans->micro_category_id);
            return view('site.cat', compact('microCategories', 'parent_id'));
        } else {
            abort(404);
        }
    }

}
