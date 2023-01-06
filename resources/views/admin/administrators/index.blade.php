
<div>
    <h1>Администраторы</h1>

    <a href="{{route('admin.administrators.create')}}">Создать администратора</a>

    <table>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пароль</th>
            <th>Email</th>
            <th>Дата создания</th>
            <th>Дата редактирования</th>
            <th>Действия</th>
        </tr>

            @forelse ($administrators as $administrator)
{{--            {{dd($administrator)}}--}}
            <tr>
                <td>{{$administrator->secondname}}</td>
                <td>{{$administrator->firstname}}</td>
                <td>{{$administrator->middlename}}</td>
                <td>{{$administrator->password}}</td>
                <td>{{$administrator->email}}</td>
                <td>{{$administrator->created_at}}</td>
                <td>{{$administrator->updated_at}}</td>
                <td> <a href="@">Редактировать</a> <a href="@">Удалить</a> </td>
            </tr>
            @empty
                <p>No users</p>
            @endforelse

{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}
{{--            <td>asd</td>--}}



    </table>

</div>
