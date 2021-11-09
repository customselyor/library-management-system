<?php

namespace App\Http\Controllers;

use App\Models\BookInventarList;
use App\Models\Olber;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OldiberdiController extends Controller
{
    public $sannerQrCode = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('oldi-berdi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $value = $request->session()->get('compareLeftContent');
        $user_id = $request->get('kitobxon_id');
        $books_id = $request->get('books_id');
        $for_how_many_days = $request->get('for_how_many_days');
        $qr_id = $request->get('qr_id');

        // $str_arr = explode(", ", $books_id);
        $user = Auth::user();
        if (isset($books_id) && count($books_id) > 0) {
            foreach ($books_id as $k => $v) {
                $book_inventar_id = $qr_id[$k];
                $qaytarish_vaqti = strtotime(date("Y-m-d") . "+ " . $for_how_many_days[$k] . " days");
                $olber_old = Olber::where('kitobxon_id', $user_id)->where('book_id', $v)->where('status', 1)->first();

                if (isset($olber_old) && $olber_old->count() > 0) {
                    $data = [
                        'status' => 2,
                        'qaytargan_vaqti' => date("Y-m-d"),
                        'qaytargan_yil' => date("Y"),
                        'qaytargan_oy' => date("m"),
                        'qaytargan_kun' => date("d"),
                    ];
                    $olber_old->update($data);
                } else {
                    $data = [
                        'kitobxon_id' => $user_id,
                        'book_id' => $v,
                        'status' => 1,
                        'olgan_vaqti' => date("Y-m-d"),
                        'olgan_yil' => date("Y"),
                        'olgan_oy' => date("m"),
                        'olgan_kun' => date("d"),
                        'book_inventar_id' => $book_inventar_id,
                        'nechchi_kun' => $for_how_many_days[$k],
                        'qaytarish_vaqti' => date("Y-m-d", $qaytarish_vaqti),
                        'qaytarish_yil' => date("Y", $qaytarish_vaqti),
                        'qaytarish_oy' => date("m", $qaytarish_vaqti),
                        'qaytarish_kun' => date("d", $qaytarish_vaqti),
                        'fakultet_id' => ($user->profile) ? $user->profile->faculty_id : '0',
                    ];
                    $olber_old = Olber::create($data);
                }
            }
        }

        // dd($request->all());
        // request()->validate(Gender::$rules);
        // $attachments = json_decode( $_POST[ 'attachments' ] );
        // $gender = Gender::create($request->all());
        if (isset($olber_old) && $olber_old->count() > 0) {
            $olber = Olber::find($olber_old->id);
            return redirect()->route('olber.show', compact('olber'));
        }

        return redirect()->route('olber.index')
            ->with('success', 'Oldi berdi created successfully.');
    }
    public function getQrCodeData(Request $request, $qrcode)
    {
        // dd($request);
        $firstCharacter = substr($qrcode, 0, 1);
        array_push($this->sannerQrCode, $qrcode);
        $this->sannerQrCode = array_unique($this->sannerQrCode);

        if ($firstCharacter == 'E' || $firstCharacter == 'R') {
            $user_profile = UserProfile::where('qr_code', $qrcode)->with('user')->first();

            return response()->json([
                'success' => true,
                'type' => 'user',
                'user_profile' => $user_profile
            ]);
        }
        return 'book';
    }
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $request)
    {

        $input = $request->all();
        if (array_key_exists('qr_code', $input)) {
            $qrcode = $input['qr_code'];
            $firstCharacter = substr($qrcode, 0, 1);
            array_push($this->sannerQrCode, $qrcode);
            $this->sannerQrCode = array_unique($this->sannerQrCode);
            $type = null;
            if ($firstCharacter == 'E' || $firstCharacter == 'R') {
                $data = UserProfile::where('qr_code', $qrcode)->with('user')->first();
                if ($data != null) {
                    return response()->json([
                        'success' => true,
                        'type' => 'user',
                        'data' => $data
                    ]);
                }
                return response()->json([
                    'success' => false,
                    'type' => 'user',
                    'data' => null
                ]);
            } else {
                $book_inventar_list = BookInventarList::where('invertar_number', $qrcode)->with('book', 'bookInventar')->first();
                if ($book_inventar_list != null) {

                    return response()->json([
                        'success' => true,
                        'type' => 'book',
                        'data' => [
                            'qr_id' => $book_inventar_list->id,
                            'book_id' => $book_inventar_list->book->id,
                            'book_title' => $book_inventar_list->book->title,
                            'book_author' => $book_inventar_list->book->author,
                            'book_copies' => $book_inventar_list->bookInventar->copies,
                            'book_faculty_code' => $book_inventar_list->bookInventar->faculty_code,
                            'book_qr_code' => $book_inventar_list->invertar_number,
                            'book_inventar_id' => $book_inventar_list->book_inventar_id,
                            'extra' => $book_inventar_list,
                        ]
                    ]);
                }

                $data = "book data";
                $type = 'book';
                return response()->json([
                    'success' => false,
                    'type' => $type,
                    'data' => $book_inventar_list
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'data' => "Data not found"
        ]);
    }
}