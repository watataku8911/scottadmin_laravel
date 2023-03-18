<!DOCTYPE html>
<html>
<head>
	<title>従業員情報追加｜ScottAdmin kadai</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<h1>従業員情報追加</h1>
<nav>
	<ul>
		<li><a href="/">TOP</a></li>
		<li><a href="/empList">従業員リスト</a></li>
		<li>従業員情報追加</li>
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
        <p>情報を入力し、登録ボタンをクリックしてください</p>
        <form action="/empAdd" method="post">
            @csrf
            <table>
                <tbody>
                    <tr>
                        <th>従業員番号&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="addEmpEmpno" name="addEmpEmpno" value="{{ old('addEmpEmpno') }}"></td>
                    </tr>
                    <tr>
                        <th>従業員名&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="addEmpEname" name="addEmpEname" value="{{ old('addEmpEname') }}"></td>
                    </tr>

                    <tr>
                        <th>役職&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="addEmpJob" name="addEmpJob" value="{{ old('addEmpJob') }}"></td>
                    </tr>

                    <tr>
                        <th>上司番号</th>
                        <td>
                        ※選択しなければ「上司なし」となります。
                            <select name="addEmpMgr" id="addEmpMgr">
                                <option value="">選択してください</option>
                        @foreach ($empList as $emp)
                            @if (old('addEmpMgr')== $emp->empno)
                                <option value="{{$emp->empno}}" selected>{{$emp->empno}}:{{$emp->ename}}</option>
                            @else
                                <option value="{{$emp->empno}}">{{$emp->empno}}:{{$emp->ename}}</option>
                            @endif
                        @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>雇用日&nbsp;<span class="required">必須</span></th>
                        <td>
                            <select name="addEmpHiredateYear" id="addEmpHiredateYear">
                                <option value="">選択してください</option>
                                @for ($i = 1960; $i <= 2025; $i++)
                                    @if (old('addEmpHiredateYear') == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                            年
                            <select name="addEmpHiredateMonth" id="addEmpHiredateMonth">
                                <option value="">選択してください</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    @if (old('addEmpHiredateMonth') == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                            月
                            <select name="addEmpHiredateDay" id="addEmpHiredateDay">
                                <option value="">選択してください</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    @if (old('addEmpHiredateDay') == $i)
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
                        <td><input type="text" id="addEmpSal" name="addEmpSal" value="{{ old('addEmpSal') }}"></td>
                    </tr>

                    <tr>
                        <th>歩合</th>
                        <td><input type="text" id="addEmpComm" name="addEmpComm" value="{{ old('addEmpComm') }}"></td>
                    </tr>
                    <tr>
                        <th>部門番号&nbsp;<span class="required">必須</span></th>
                        <td>
                            <select name="addEmpDeptno" id="addEmpDeptno">
                                <option value="">選択してください</option>
                        @foreach ($deptList as $dept)
                            @if (old('addEmpDeptno') == $dept->deptno))
                                <option value="{{$dept->deptno}}" selected>{{$dept->deptno}}:{{$dept->dname}}</option>
                            @else
                                <option value="{{$dept->deptno}}">{{$dept->deptno}}:{{$dept->dname}}</option>
                            @endif
                        @endforeach
                            </select>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="submit"><input type="submit" value="登録"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>
</body>
</html>