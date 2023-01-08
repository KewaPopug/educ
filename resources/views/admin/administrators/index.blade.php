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
            <tr>
                <td>{{$administrator->secondname}}</td>
                <td>{{$administrator->firstname}}</td>
                <td>{{$administrator->middlename}}</td>
                <td>{{$administrator->password}}</td>
                <td>{{$administrator->email}}</td>
                <td>{{$administrator->created_at}}</td>
                <td>{{$administrator->updated_at}}</td>
                <td>
                    <form action="{{route('admin.administrators.update', $administrator->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                     <a href="@">Удалить</a> </td>
            </tr>
            @empty
                <p>No users</p>
            @endforelse
    </table>
</div>
