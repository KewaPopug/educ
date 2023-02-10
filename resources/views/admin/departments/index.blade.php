<div>
    <h1>Группа специальностей</h1>
    <a href="{{route('admin.departments.create')}}">Создать группу специальностей</a>
    <form method="get" action="{{route("admin.departments.departments", ['$faculty_id' => $faculties])}}">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="faculty_id">Факультет</label><br />
                    <select name="faculty_id" class="form-control">
                        <option value="">Выберете факультет</option>
                        @foreach ($faculties as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button>Поиск</button>
        </div>
    </form>

    <table>
        <tr>
            <th>Кафедра</th>
            <th>Сокращенное название кафедры</th>
            <th>Факультет</th>
            <th>Дата редактирования</th>
            <th>Действия</th>
        </tr>
            @forelse ($departments as $department)
            <tr>
                <td>{{$department->name_department}}</td>
                <td>{{$department->short_name }}</td>
                <td>{{$department->faculty->name_faculty}}</td>
                <td>{{$department->created_at}}</td>
                <td>{{$department->updated_at}}</td>
                <td>
                    <form action="{{route('admin.departments.update', $department->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.departments.delete', $department->id)}}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>
            @empty
                <p>No group specialization</p>
            @endforelse
    </table>
</div>
