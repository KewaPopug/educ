<?php //$faculty_id = ''; ?><!---->


<div>
    <h1>Группа специальностей</h1>
    <a href="{{route('admin.groups_specializations.create')}}">Создать группу специальностей</a>
    <form method="get" action="{{route("admin.groups_specializations.groups_specializations", ['$faculty_id' => $faculties])}}">
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
            <th>Группа специальностей</th>
            <th>Факультет</th>
            <th>Дата редактирования</th>
            <th>Действия</th>
        </tr>
            @forelse ($groups_specializations as $group_specialization)
            <tr>
                <td>{{$group_specialization->name_group_specialization}}</td>
                <td>{{$group_specialization->faculty->name_faculty}}</td>
                <td>{{$group_specialization->created_at}}</td>
                <td>{{$group_specialization->updated_at}}</td>
                <td>
                    <form action="{{route('admin.groups_specializations.update', $group_specialization->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.groups_specializations.delete', $group_specialization->id)}}" method="get">
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
