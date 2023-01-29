<div>
    <h1>Факультет</h1>
    <a href="{{route('admin.faculties.create')}}">Создать факультет</a>
    <table>
        <tr>
            <th>Сокращение факультета</th>
            <th>Факультет</th>
            <th>Дата редактирования</th>
            <th>Действия</th>
        </tr>
            @forelse ($faculties as $faculty)
            <tr>
                <td>{{$faculty->faculty_reduction}}</td>
                <td>{{$faculty->name_faculty}}</td>
                <td>{{$faculty->created_at}}</td>
                <td>{{$faculty->updated_at}}</td>
                <td>
                    <form action="{{route('admin.faculties.update', $faculty->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.faculties.delete', $faculty->id)}}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>
            @empty
                <p>No faculties</p>
            @endforelse
    </table>
</div>
