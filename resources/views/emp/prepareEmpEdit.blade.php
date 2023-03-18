<!DOCTYPE html>
<html>
<head>
	<title>従業員情報編集｜ScottAdmin kadai</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
<h1>従業員情報編集</h1>
<nav>
	<ul>
		<li><a href="/">TOP</a></li>
		<li><a href="/empList">従業員リスト</a></li>
		<li>従業員情報編集</li>
	</ul>
</nav>
@if ($errors->any())
    <section id="errorMsg">
    <p>以下のメッセージをご確認ください。</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
    <section>
        <p>情報を入力し、更新ボタンをクリックしてください</p>
        <form action="empEdit" method="post">
            @csrf
            <table>
                <tbody>
                    <tr>
                        <th>従業員番号</th>
                        <td>{{$emp[0]->empno}}<input type="hidden" id="editEmpEmpno" name="editEmpEmpno" value="{{$emp[0]->empno}}"></td>
                    </tr>
                    <tr>
                        <th>従業員名&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="editEmpEname" name="editEmpEname" value="{{$emp[0]->ename}}"></td>
                    </tr>

                    <tr>
                        <th>役職&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="editEmpJob" name="editEmpJob" value="{{$emp[0]->job}}"></td>
                    </tr>

                    <tr>
                        <th>上司番号&nbsp;<span class="required">必須</span></th>
                        <td>
                            <select id="editEmpMgr" name="editEmpMgr">
                        @if ($emp[0]->mgr == null)
                                <option value="" selected>上司なし</option>
                        @else
                                <option value="">上司なし</option>
                        @endif
                        @foreach ($empLists as $empList)
                        @if ($emp[0]->mgr == $empList->empno)
                            <option value="{{$empList->empno}}" selected>{{$empList->empno}}:{{$empList->ename}}</option>
                        @else
                            <option value="{{$empList->empno}}">{{$empList->empno}}:{{$empList->ename}}</option>
                        @endif
                    @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>雇用日&nbsp;<span class="required">必須</span></th>
                        <td>
                            <select name="editEmpHiredateYear" id="editEmpHiredateYear">
                            <option value="">選択してください</option>
                            @for ($i = 1960; $i <= 2025; $i++)
                                @if ($addEmpHiredate[0] == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                            </select>
                            年
                            <select name="editEmpHiredateMonth" id="editEmpHiredateMonth">
                            <option value="">選択してください</option>
                            @for ($i = 1; $i <= 12; $i++)
                                @if ($addEmpHiredate[1] == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                            </select>
                            月
                            <select name="editEmpHiredateDay" id="editEmpHiredateDay">
                            <option value="">選択してください</option>
                            @for ($i = 1; $i <= 31; $i++)
                                @if ($addEmpHiredate[2] == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                            </select>
                            日
                        </td>
                    </tr>

                    <tr>
                        <th>給与&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="editEmpSal" name="editEmpSal" value="{{$emp[0]->sal}}"></td>
                    </tr>

                    <tr>
                        <th>歩合</th>
                        <td><input type="text" id="editEmpComm" name="editEmpComm" value="{{$emp[0]->comm}}"></td>
                    </tr>
                    <tr>
                        <th>部門番号&nbsp;<span class="required">必須</span></th>
                        <td>
                            <select id="editEmpDeptno" name="editEmpDeptno">
                                <option value="">選択してください</option>
                                @foreach ($deptLists as $deptList)
                        @if ($emp[0]->deptno == $deptList->deptno))
                            <option value="{{$deptList->deptno}}" selected>{{$deptList->deptno}}:{{$deptList->dname}}</option>
                        @else
                            <option value="{{$deptList->deptno}}">{{$deptList->deptno}}:{{$deptList->dname}}</option>
                        @endif
                    @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="submit"><input type="submit" value="編集"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>
</body>
</html>