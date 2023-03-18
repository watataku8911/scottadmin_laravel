{{--コメント--}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <title>部門情報リスト｜ScottAdminMVC Sample</title>
</head>
<body>
<h1>部門情報リスト</h1>
	<nav>
		<ul>
			<li><a href="/">TOP</a></li>
			<li>部門情報リスト</li>
		</ul>
	</nav>
    @if (session('flash_message'))
    <section>
        <p>
            {{ session('flash_message') }}
        </p>
    </section>
    @endif
    <section>
		<p>
			新規登録は<a href="/goDeptAdd">こちら</a>から
		</p>
	</section>
    <tbody>

	<section>
		<table>
			<thead>
				<tr>
					<th>部門番号</th>
					<th>部門名</th>
					<th>所在地</th>
					<th colspan="2">操作</th>
				</tr>
			</thead>
			<tbody>
                @forelse ($deptList as $dept)
                <tr>
                <td>{{$dept->deptno}}</td>
                <td>{{$dept->dname}}</td>
                <td>{{ $dept->loc }}</td>
                <td>
                    <form action='/prepareDeptEdit'>
                        <input type='hidden' id='editDeptDeptno' name='editDeptDeptno' value='{{$dept->deptno}}'>
                        <input type='submit' value='編集'>
                    </form>
                </td>
                <td>
                    <form action='/confirmDeptDelete' method='post'>
                    @csrf
                        <input type='hidden' id='deleteDeptDeptno' name='deleteDeptDeptno' value='{{$dept->deptno}}'>
                        <input type='submit' value='削除'>
                    </form>
                </td>
                </tr>
                @empty
                <tr>
					<td colspan="3">該当データは存在しません</td>
				</tr>
            @endforelse
            </tbody>
        </table>
    </body>
</html>
