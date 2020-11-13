<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HostingController extends Controller
{
    public function getTable() {
        return DB::table('domens')
            ->get();
    }

    public function editTable(Request $request) {
        DB::table('domens')
            ->where('id', $request->id)
            ->update([
                "name" => $request->name,
                "domenDate" => $request->domenDate,
                "domenPrice" => $request->domenPrice,
                "comment" => $request->comment,
                "hostDate" => $request->hostDate,
                "hostPrice" => $request->hostPrice
            ]);
        return "Edit successfull";
    }

    public function delete(Request $request) {
        DB::table('domens')
            ->where('id', $request->id)
            ->delete();
        return "Delete successfull";
    }

    public function addDomen(Request $request) {
        DB::table('domens')
            ->insertOrIgnore([
                "name" => $request->name,
                "domenDate" => $request->domenDate,
                "domenPrice" => $request->domenPrice,
                "comment" => $request->comment,
                "hostDate" => $request->hostDate,
                "hostPrice" => $request->hostPrice
            ]);
        return "Add successfull";
    }
}
