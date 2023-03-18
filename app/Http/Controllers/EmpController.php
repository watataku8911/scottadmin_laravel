<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
 
class EmpController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    public function empList(): View
    {
        $empList = DB::select('select * from emp');
        $deptList = DB::select('select * from dept');
        foreach($empList as $emp) {
            $emp->hiredate = date("Y年m月d日",strtotime($emp->hiredate));
            if(empty($emp->mgr)) {
                $emp->mgr = "上司なし";
            } else {
                $empMgr = DB::select('select * from emp where empno = ?', [$emp->mgr]);
                $emp->mgr = $emp->mgr." ".$empMgr[0]->ename;
            }
            foreach($deptList as $dept) {
                if ($emp->deptno == $dept->deptno) {
                    $emp->deptno = $emp->deptno." ".$dept->dname;
                }
            }
        }
        return view('emp/empList', ['empList' => $empList]);
    }

    public function goEmpAdd(): View
    {
        $empList = DB::select('select * from emp');
        $deptList = DB::select('select * from dept');
        return view('emp/goEmpAdd', ['empList' => $empList, 'deptList' => $deptList]);
    }

    public function empAdd(Request $request): RedirectResponse
    {
        $addEmpHiredate = '';

        $addEmpEmpno = $request["addEmpEmpno"];
        $addEmpEname = $request["addEmpEname"];
        $addEmpJob = $request["addEmpJob"];
        $addEmpMgr = $request["addEmpMgr"];
        $addEmpHiredateYear = $request["addEmpHiredateYear"];
        $addEmpHiredateMonth = $request["addEmpHiredateMonth"];
        $addEmpHiredateDay = $request["addEmpHiredateDay"];
        $addEmpSal = $request["addEmpSal"];
        $addEmpComm = $request["addEmpComm"];
        $addEmpDeptno = $request["addEmpDeptno"];

        $addEmpEmpno = trim($addEmpEmpno);
        $addEmpEname = trim($addEmpEname);
        $addEmpJob = trim($addEmpJob);
        $addEmpMgr = trim($addEmpMgr);
        $addEmpSal = trim($addEmpSal);
        $addEmpComm = trim($addEmpComm);

        if(empty($addEmpMgr)) {
            $addEmpMgr = null;
        }
        if(empty($addEmpComm)) {
            $addEmpComm = null;
        }


        /* validation check */
        $request->validate([
            'addEmpEmpno' => 'required | numeric',
            'addEmpEname' => 'required',
            'addEmpJob' => 'required',
            'addEmpHiredateYear' => 'required',
            'addEmpHiredateMonth' => 'required',
            'addEmpHiredateDay' => 'required',
            'addEmpSal' => 'required | numeric',
            'addEmpDeptno' => 'required',
        ],
        [
            'addEmpEmpno.required' => '従業員番号は必須です。',
            'addEmpEmpno.numeric' => '従業員番号は数値で入力してください。',

            'addEmpEname.required'  => '従業員名は必須項目です。',

            'addEmpJob.required'  => '役職は必須項目です。',


            'addEmpHiredateYear.required' => '年を選択してください。',

            'addEmpHiredateMonth.required' => '月を選択してください。',

            'addEmpHiredateDay.required' => '日を選択してください。',

            'addEmpSal.required' => '給与は必須です。',
            'addEmpSal.numeric' => '給与は数値で入力してください。',


            'addEmpDeptno.required' => '部門番号を選択してください。',
        ]);

        $addEmpHiredate = $addEmpHiredateYear.'-'.$addEmpHiredateMonth.'-'.$addEmpHiredateDay;
        


        DB::insert('insert into emp values(?, ?, ?, ?, ?, ?, ?, ?)', [$addEmpEmpno, $addEmpEname, $addEmpJob, $addEmpMgr, $addEmpHiredate, $addEmpSal, $addEmpComm, $addEmpDeptno]);
        $request->session()->flash('flash_message', '従業員番号' . $addEmpEmpno . 'を追加しました');
        return redirect("/empList");
    }

    public function prepareEmpEdit(Request $request): View
    {
        $editEmpEmpno = $request["editEmpEmpno"];
        $emp = DB::select('select * from emp where empno = ?', [$editEmpEmpno]);
        $addEmpHiredate = explode("-", $emp[0]->hiredate);
        $empList = DB::select('select * from emp');
        $deptList = DB::select('select * from dept');

        return view('emp/prepareEmpEdit', ['emp' => $emp, 'addEmpHiredate' => $addEmpHiredate, 'deptLists' => $deptList, 'empLists' => $empList]);
    }

    public function empEdit(Request $request): RedirectResponse
    {
        $editEmpEmpno = $request["editEmpEmpno"];
        $editEmpEname = $request["editEmpEname"];
        $editEmpJob = $request["editEmpJob"];
        $editEmpMgr = $request["editEmpMgr"];
        $editEmpHiredateYear = $request["editEmpHiredateYear"];
        $editEmpHiredateMonth = $request["editEmpHiredateMonth"];
        $editEmpHiredateDay = $request["editEmpHiredateDay"];
        $editEmpSal = $request["editEmpSal"];
        $editEmpComm = $request["editEmpComm"];
        $editEmpDeptno = $request["editEmpDeptno"];

        $editEmpEmpno = trim($editEmpEmpno);
        $editEmpEname = trim($editEmpEname);
        $editEmpJob = trim($editEmpJob);
        $editEmpMgr = trim($editEmpMgr);
        $editEmpSal = trim($editEmpSal);
        $editEmpComm = trim($editEmpComm);

        if(empty($editEmpMgr)) {
            $editEmpMgr = null;
        }
        if(empty($editEmpComm)) {
            $editEmpComm = null;
        }

        /* validation check */
        $request->validate([
            'editEmpEmpno' => 'required | numeric',
            'editEmpEname' => 'required',
            'editEmpJob' => 'required',
            'editEmpHiredateYear' => 'required',
            'editEmpHiredateMonth' => 'required',
            'editEmpHiredateDay' => 'required',
            'editEmpSal' => 'required | numeric',
            'editEmpDeptno' => 'required',
        ],
        [
            'editEmpEmpno.required' => '従業員番号は必須です。',
            'editEmpEmpno.numeric' => '従業員番号は数値で入力してください。',

            'editEmpEname.required'  => '従業員名は必須項目です。',

            'editEmpJob.required'  => '役職は必須項目です。',


            'editEmpHiredateYear.required' => '年を選択してください。',

            'editEmpHiredateMonth.required' => '月を選択してください。',

            'editEmpHiredateDay.required' => '日を選択してください。',

            'editEmpSal.required' => '給与は必須です。',
            'editEmpSal.numeric' => '給与は数値で入力してください。',


            'addEmpDeptno.required' => '部門番号を選択してください。',
        ]);

        $editEmpHiredate = $editEmpHiredateYear.'-'.$editEmpHiredateMonth.'-'.$editEmpHiredateDay;


        DB::update('update emp set ename = ?, job = ?, mgr = ?, hiredate = ?,sal = ?,comm = ?, deptno = ? where empno = ?', [$editEmpEname, $editEmpJob, $editEmpMgr, $editEmpHiredate, $editEmpSal, $editEmpComm, $editEmpDeptno, $editEmpEmpno]);
        $request->session()->flash('flash_message', '従業員番号' . $editEmpEmpno . 'を更新しました');
        return redirect("/empList");
    }
    
    public function confirmEmpDelete(Request $request): View
    {
        $deleteEmpEmpno = $request["deleteEmpEmpno"];
        $emp = DB::select("select * from emp where empno = ?", [$deleteEmpEmpno]);

        $emp[0]->hiredate = date("Y年m月d日",strtotime($emp[0]->hiredate));
        if(empty($emp[0]->mgr)) {
            $emp[0]->mgr = "上司なし";
        } else {
            $empMgr = DB::select('select * from emp where empno = ?', [$emp[0]->mgr]);
            $emp[0]->mgr = $emp[0]->mgr." ".$empMgr[0]->ename;
        }
        $deptList = DB::select('select * from dept');
        foreach($deptList as $dept) {
            if ($emp[0]->deptno == $dept->deptno) {
                $emp[0]->deptno = $emp[0]->deptno." ".$dept->dname;
            }
        }
        return view('emp/confirmEmpDelete', ['emp' => $emp]);
    }


    public function empDelete(Request $request): RedirectResponse
    {
        $deleteEmpEmpno = $request["deleteEmpEmpno"];
        DB::delete('delete from emp where empno = ?', [$deleteEmpEmpno]);
        $request->session()->flash('flash_message', '従業員番号' . $deleteEmpEmpno . 'を削除しました');
        return redirect("/empList");
    }
}

