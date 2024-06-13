<?php

namespace App\Http\Controllers;

use App\Models\AllRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
	public function index(Request $request){
		$allRecords = AllRecord::Where('created_by', auth()->user()->id_user)->count();
		return view('dashboard.dashboard', [
			'allRecords' => $allRecords,
		]);
	}
}
