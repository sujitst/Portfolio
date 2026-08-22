<?php
namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    public function langChange(Request $request) {
        $lang = $request->query('lang');
        $allowedLangs = ['en', 'bn', 'ar', 'hi', 'sp', 'fr'];

        if (in_array($lang, $allowedLangs)) {
            session([
                'lang_code' => $lang,
                'text_dir'  => $lang === 'ar' ? 'rtl' : 'ltr',
            ]);
        }
        return redirect()->back();
    }
}