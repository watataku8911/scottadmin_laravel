<!DOCTYPE html>
<html>
<head>
	<title>部門情報追加｜ScottAdmin Sample</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<h1>部門情報追加</h1>
<nav>
	<ul>
		<li><a href="/">TOP</a></li>
		<li><a href="/deptList">部門リスト</a></li>
		<li>部門情報追加</li>
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
        <form action="deptAdd" method="post">
        @csrf 
            <table>
                <tbody>
                    <tr>
                        <th>部門番号&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="addDeptDeptno" name="addDeptDeptno" value="{{ old('addDeptDeptno') }}"></td>
                    </tr>
                    <tr>
                        <th>部門名&nbsp;<span class="required">必須</span></th>
                        <td><input type="text" id="addDeptDname" name="addDeptDname" value="{{ old('addDeptDname') }}"></td>
                    </tr>

                    <tr>
                        <th>所在地</th>
                        <td><input type="text" id="addDeptLoc" name="addDeptLoc" value="{{ old('addDeptLoc') }}"></td>
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