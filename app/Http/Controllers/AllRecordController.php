<?php

namespace App\Http\Controllers;
use App\Models\AllRecord;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Auth;
class AllRecordController extends Controller
{
	// get all records
	public function index(){
		$allRecords = AllRecord::where('created_by', auth()->user()->id_user)->orderBy('title', 'asc')->get();
		return view('all-records.record', [
			'allRecords' => $allRecords
		]);
	}
	// create record
	public function create(){
		return view('all-records.record-add');
	}
	// save record
	public function store(Request $request){
		$validated = $request->validate([
			'title' => 'required',
			'status' => 'required',
		]);
		$AllRecord = AllRecord::create($request->all());
		Alert::success('Success', 'Record has been saved !');
		return redirect('/all-records');
	}
	// view record for update
	public function edit($id){
		$getRecord = AllRecord::findOrFail($id);
		return view('all-records.record-edit', [
			'getRecord' => $getRecord,
		]);
	}
	// update record
	public function update(Request $request, $id){
		$validated = $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);
		$dataUpdate = AllRecord::findOrFail($id);
        $dataUpdate->update($validated);
        Alert::info('Success', 'Record has been updated !');
		return redirect('/all-records');
	}
	// delete record
	public function destroy($id){
		try {
			$deletedRecord = AllRecord::findOrFail($id);
			$deletedRecord->delete();
			Alert::error('Success', 'Record has been deleted !');
			return redirect('/all-records');
		} catch (Exception $ex) {
			Alert::warning('Error', 'Cant deleted, Record already used !');
			return redirect('/all-records');
		}
	}
}
