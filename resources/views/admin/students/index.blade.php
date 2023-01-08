<div>
    <h1>Студенты</h1>
    <a href="{{route('admin.students.create')}}">Создать студента</a>
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
        @forelse ($students as $student)
            <tr>
                <td>{{$student->secondname}}</td>
                <td>{{$student->firstname}}</td>
                <td>{{$student->middlename}}</td>
                <td>{{$student->password}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->created_at}}</td>
                <td>{{$student->updated_at}}</td>
                <td>
                    <form action="{{route('admin.students.update', $student->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.students.delete', $student->id)}}" method="get">
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
