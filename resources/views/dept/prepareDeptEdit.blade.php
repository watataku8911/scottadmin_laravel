<!DOCTYPE html>
<html lang="ja">
<head>
	<title>部門情報編集｜ScottAdminMVC Sample</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<meta charset="utf-8">
</head>
<body>
	<h1>部門情報編集</h1>
	<nav>
		<ul>
			<li><a href="/">TOP</a></li>
			<li><a href="/deptList">部門リスト</a></li>
			<li>部門情報編集</li>
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
        
		<form action="/deptEdit" method="post">
        @csrf
			<table>
				<tbody>
					<tr>
						<th>部門番号</th>
						<td>{{$dept[0]->deptno}}<input type="hidden" name="editDeptDeptno" id="editDeptDeptno" value="{{$dept[0]->deptno}}"></td>
					</tr>
					<tr>
						<th>部門名&nbsp;<span class="required">必須</span></th>
						<td><input type="text" name="editDeptDname" id="editDeptDname" value="{{$dept[0]->dname}}"></td>
					</tr>
					<tr>
						<th>所在地</th>
						<td><input type="text" name="editDeptLoc" id="editDeptLoc" value="{{$dept[0]->loc}}"></td>
					</tr>
					<tr>
						<td colspan="2" class="submit"><input type="submit" value="更新"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</section>

</body>
</html>