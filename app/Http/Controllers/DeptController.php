<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
 
class DeptController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    public function deptList(): View
    {
        $deptList = DB::select('select * from dept');
        return view('dept/deptList', ['deptList' => $deptList]);
    }

    public function deptAdd(Request $request): RedirectResponse
    {
        $addDeptDeptno = $request["addDeptDeptno"];
        $addDeptDname = $request["addDeptDname"];
        $addDeptLoc = $request["addDeptLoc"];

        $addDeptDeptno = trim($addDeptDeptno);
        $addDeptDname = trim($addDeptDname);
        $addDeptLoc = trim($addDeptLoc);

        /* validation check */
        $request->validate([
            'addDeptDeptno' => 'required | numeric',
            'addDeptDname' => 'required',
        ],
        [
            'addDeptDeptno.required' => '部門番号は必須です。',
            'addDeptDeptno.numeric' => '部門番号は数値で入力してください。',

            'addDeptDname.required'  => '部門名は必須項目です。',
        ]);
        DB::insert('insert into dept values(?, ?, ?)', [$addDeptDeptno, $addDeptDname, $addDeptLoc]);
        $request->session()->flash('flash_message', '部門番号' . $addDeptDeptno . 'を追加しました');

        return redirect("/deptList");
    }

    public function prepareDeptEdit(Request $request): View
    {
        $editDeptDeptno = $request["editDeptDeptno"];
        $dept = DB::select('select * from dept where deptno = ?', [$editDeptDeptno]);
        return view('dept/prepareDeptEdit', ['dept' => $dept]);
    }

    public function deptEdit(Request $request): RedirectResponse
    {
        $editDeptDname = $request["editDeptDname"];
        $editDeptLoc = $request["editDeptLoc"];
        $editDeptDeptno = $request["editDeptDeptno"];

        $editDeptDname = trim($editDeptDname);
        $editDeptLoc = trim($editDeptLoc);

        /* validation check */
        $request->validate([
            'editDeptDname' => 'required',
        ],
        [
            'editDeptDname.required'  => '部門名は必須項目です。',
        ]);
        DB::update('update dept set dname = ?, loc = ? where deptno = ?', [$editDeptDname, $editDeptLoc, $editDeptDeptno,]);
        $request->session()->flash('flash_message', '部門番号' . $editDeptDeptno . 'を編集しました');

        return redirect("/deptList");

    }

    public function confirmDeptDelete(Request $request): View
    {
        $deleteDeptDeptno = $request["deleteDeptDeptno"];
        $dept = DB::select('select * from dept where deptno = ?', [$deleteDeptDeptno]);
        return view('dept/confirmDeptDelete', ['dept' => $dept]);
    }


    public function deptDelete(Request $request): RedirectResponse
    {
        $deleteDeptDeptno = $request["deleteDeptDeptno"];
        DB::delete('delete from dept where deptno = ?', [$deleteDeptDeptno]);
        $request->session()->flash('flash_message', '部門番号' . $deleteDeptDeptno . 'を削除しました');
        return redirect("/deptList");
    }

    public function returnDeptJson()
    {
        $deptList = DB::select('select * from dept');
        return response()->json(['deptList' => $deptList]);
    }
}

