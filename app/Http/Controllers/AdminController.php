<?php

namespace App\Http\Controllers;

use App\Models\BaranagyInfo;
use App\Models\CalamityType;
use App\Models\EvacuationCenter;
use App\Models\EvacuationInfo;
use App\Models\lgu;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.home');
    }

    public function ViewDashboard()
    {
        $evacCount = EvacuationInfo::count();
        $famCount = EvacuationInfo::count();
        $barCount = BaranagyInfo::count();
        $centerCount = EvacuationCenter::count();
        $femaleCount = EvacuationInfo::where('gender','Female')->count();
        $maleCount = EvacuationInfo::where('gender','Male')->count();


        return view('admin.index', compact('evacCount','famCount','femaleCount','maleCount', 'barCount', 'centerCount'));
    }

    public function ViewCalamity()
    {
        $calamity = CalamityType::all();

        return view('admin.calamity-type', compact('calamity'));
    }

    //    start calamity add

    public function AddCalamity(Request $request)
    {
        $request->validate([
            'calamity_name' => 'required|max:255',
        ]);

        CalamityType::create($request->all());

        return redirect()->route('admin.calamity-type')
            ->with('alert-success', 'Added Calamity successfully.');

    }

    public function updateDataCalamity(Request $request, $id)
    {
        $calamity = calamityType::find($id);

        if (! $calamity) {
            return redirect()->back()->with('error', 'Calamity not found.');
        }

        $calamity->calamity_name = $request->calamity_name;
        $calamity->save();

        return response()->json(['message' => 'Calamity updated successfully']);
    }

    // update calamity-type end

    // delete calamity type start

    public function deleteDataCalamity(Request $request, $id)
    {
        // Find and delete the item
        $calamityDel = CalamityType::findOrFail($id);
        $calamityDel->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    // delete calamity type end

    //    end calamity type

    // start barangay
    public function ViewBarangay()
    {
        $brgyinfo = BaranagyInfo::all();

        return view('admin.barangay', compact('brgyinfo'));
    }

    public function AddBarangay(Request $request)
    {
        $request->validate([
            'barangay_name' => 'required|max:255',
        ]);

        BaranagyInfo::create($request->all());

        return redirect()->route('admin.barangay')
            ->with('msg-added', 'Added Barangay successfully.');

    }

    // delete barangay name start

    public function deleteBarangay(Request $request, $id)
    {
        // Find and delete the item
        $Delbrgy = BaranagyInfo::findOrFail($id);
        $Delbrgy->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    // delete barangay name end

    // start editing barangay

    public function editBarangay(Request $request, $id)
    {
        $editbrgy = BaranagyInfo::find($id);

        if (! $editbrgy) {
            return redirect()->back()->with('error', 'Barangay not found.');
        }

        $editbrgy->barangay_name = $request->barangay_name;
        $editbrgy->save();

        return response()->json(['message' => 'Barangay updated successfully']);
    }

    // end editing barangay

    //end barangay


    // start Evacuation center
    public function ViewEvacuationCenter()
    {
        $evacinfo = EvacuationCenter::all();
        return view('admin.evacuation-center', compact('evacinfo'));
    }

    // start Add Evacuation Center

    public function AddEvacuationCenter(Request $request)
    {
        $request->validate([
            'center_name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact' => 'required|max:255',
        ]);

        EvacuationCenter::create($request->all());

        return redirect()->route('admin.evacuation-center')
            ->with('msg-added', 'Added Evacuation Center successfully.');

    }


    // end Add Evacuation Center

    // Start Delete Center

    public function deleteCenter(Request $request, $id)
    {
        // Find and delete the item
        $DelEvac = EvacuationCenter::findOrFail($id);
        $DelEvac->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    // End Delete Center

    // Start Edit Evacuation Center

    public function editCenter(Request $request, $id)
    {
        $editEvac = EvacuationCenter::find($id);

        if (! $editEvac) {
            return redirect()->back()->with('error', 'Evacuation Center not found.');
        }

        $editEvac->center_name = $request->center_name;
        $editEvac->address = $request->address;
        $editEvac->contact = $request->contact;
        $editEvac->save();

        return response()->json(['message' => 'Evacuation Center updated successfully']);
    }

    // End Edit Evacuation Center

    // End Evacuation Center

    // Start Evacuess
    public function AddEvacuees()
    {
        $brgy = BaranagyInfo::all();
        $calamity = CalamityType::all();
        $evac_center = EvacuationCenter::all();
        return view('admin.add-evacuees', compact('brgy', 'calamity', 'evac_center'));
    }

    public function AddEvacuee(Request $request)
    {
        $request->validate([
            'Last_name' => 'required|max:255',
            'First_name' => 'required|max:255',
            'Middle_name' => 'required|max:255',
            'contact' => 'required|max:255',
            'age' => 'required|max:2',
            'gender' => 'required|max:6',
            'brgy' => 'required|max:255',
            'address' => 'required|max:255',
            'head_fam' => 'required|max:255',
            'evac_center' => 'required|max:255',
            'calamity' => 'required|max:255',
        ]);

        EvacuationInfo::create($request->all());

        return redirect()->route('admin.manage-evacuees')->with('success', 'Item added successfully');

    }

    // End Evacuess


    public function ManageEvacuees()
    {
        $evac_info = EvacuationInfo::all();
        $brgy = BaranagyInfo::all();
        $calamity = CalamityType::all();
        $evac_center = EvacuationCenter::all();
        return view('admin.manage-evacuees', compact('evac_info','brgy', 'calamity', 'evac_center'));
    }

    // start edit evacuees
    public function updateEvacInfo(Request $request, $id)
    {
        \Log::info($request->all());
        $editEvacueeInfo = EvacuationInfo::find($id);

        if (!$editEvacueeInfo) {
            return response()->json(['error' => 'Evacuation Center not found.'], 404);
        }
        // Update the properties of $editEvacueeInfo with the validated data
        $editEvacueeInfo->Last_name = $request->Last_name;
        $editEvacueeInfo->First_name = $request->First_name;
        $editEvacueeInfo->Middle_name = $request->Middle_name;
        $editEvacueeInfo->contact = $request->contact;
        $editEvacueeInfo->age = $request->age;
        $editEvacueeInfo->gender = $request->gender;
        $editEvacueeInfo->brgy = $request->brgy;
        $editEvacueeInfo->address = $request->address;
        $editEvacueeInfo->head_fam = $request->head_fam;
        $editEvacueeInfo->evac_center = $request->evac_center;
        $editEvacueeInfo->calamity = $request->calamity;

        $editEvacueeInfo->save();

        return response()->json(['message' => 'Evacuation Center updated successfully']);
    }
    // end edit evacuees

    // start delete evacuees

    public function deleteEvacInfo(Request $request, $id)
    {
        // Find and delete the item
        $DelEvacInfo = EvacuationInfo::findOrFail($id);
        $DelEvacInfo->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    // end delete evacuees


// start Lgu
    public function ViewLGU()
    {
        return view('admin.lgu');

    }

    // start add Lgu

    public function AddLgu(Request $request)
    {
        $request->validate([
            'city' => 'required|max:255',
            'contact_info' => 'required|max:255',
            'email' => 'required|max:255',
            'website' => 'required|max:255',
            'fb' => 'required|max:225',

        ]);

        lgu::create($request->all());

        return redirect()->route('admin.lgu')->with('success', 'Item added successfully');

    }


    // end add Lgu
// end Lgu
    public function AddUser()
    {
        return view('admin.add-user');
    }
// add user
    public function AddUsers(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',

        ]);

        User::create($request->all());

        return redirect()->route('admin.manage-user')->with('success', 'Item added successfully');

    }
    // end add user

    //manage user

    public function ManageUser()
    {
        $users = User::all();
        return view('admin.manage-user', compact('users'));

    }

    // edit user

    public function updateUsers(Request $request, $id)
    {
        $editUser = User::find($id);

        if (! $editUser) {
            return redirect()->back()->with('error', 'Evacuation Center not found.');
        }

        $editUser->name = $request->name;
        $editUser->email = $request->email;
        $editUser->role = $request->role;
        $editUser->status = $request->status;
        $editUser->password = $request->password;
        $editUser->save();

        return response()->json(['message' => 'User updated successfully']);
    }
// end edit user

// start delete user

public function deleteUser(Request $request, $id)
{
    // Find and delete the item
    $deleteuser = User::findOrFail($id);
    $deleteuser->delete();

    return response()->json(['message' => 'Item deleted successfully']);
}

// end delete evacuees

// end delete user

    // end user

    // end manage user

    public function ViewEvacueesReport()
    {
        $evacuees = EvacuationInfo::all();
        return view('admin.evacuees-report', compact('evacuees'));
    }

    public function ViewGenderReport()
    {
        $femaleCount = EvacuationInfo::where('gender','Female')->count();
        $maleCount = EvacuationInfo::where('gender','Male')->count();
        return view('admin.gender-report', compact('femaleCount', 'maleCount'));
    }

    public function ViewBarangayReport()
    {
        $barangayCounts = EvacuationInfo::select(
            'brgy',
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('brgy')
        ->get();
        return view('admin.barangay-report', compact('barangayCounts'));
    }

    public function ViewAgeReport()
    {
        $ageBrackets = EvacuationInfo::select(
            DB::raw('CASE
                WHEN age BETWEEN 0 AND 5 THEN "0 to 5"
                WHEN age BETWEEN 6 AND 10 THEN "6 to 10"
                WHEN age BETWEEN 11 AND 20 THEN "11 to 20"
                WHEN age BETWEEN 21 AND 30 THEN "21 to 30"
                WHEN age BETWEEN 31 AND 40 THEN "31 to 40"
                WHEN age BETWEEN 41 AND 50 THEN "41 to 50"
                WHEN age BETWEEN 51 AND 60 THEN "51 to 60"
                ELSE "60 up"
            END AS age_bracket'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('age_bracket')
        ->get();
        return view('admin.age-report', compact('ageBrackets'));
    }

    public function ViewCalamityReport()
    {
        $calamityCounts = EvacuationInfo::select(
            'calamity',
            DB::raw('COUNT(*) AS count'),
            DB::raw("CASE
                WHEN calamity = 'Flood' THEN 'rgb(79,129,189)'
                WHEN calamity = 'Typhoon' THEN 'rgba(0, 158, 251, 1)'
                WHEN calamity = 'Earthquake' THEN 'rgb(255, 193, 7)'
                ELSE 'rgb(0, 0, 0)' END AS color")
        )
        ->groupBy('calamity')
        ->get();
        return view('admin.calamity-report',compact('calamityCounts'));
    }

    public function ViewCenterReport()
    {
        $centerCounts = EvacuationInfo::select(
            'evac_center',
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('evac_center')
        ->get();

        return view('admin.center-report', compact('centerCounts'));
    }
}