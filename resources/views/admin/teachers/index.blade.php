<div>
    <h1>Учитель</h1>
    <a href="{{route('admin.teachers.create')}}">Создать учителя</a>
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
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{$teacher->secondname}}</td>
                <td>{{$teacher->firstname}}</td>
                <td>{{$teacher->middlename}}</td>
                <td>{{$teacher->password}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->created_at}}</td>
                <td>{{$teacher->updated_at}}</td>
                <td>
                    <form action="{{route('admin.teachers.update', $teacher->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.teachers.delete', $teacher->id)}}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>
        @empty
            <p>No users</p>
        @endforelse
    </table>
</div>
