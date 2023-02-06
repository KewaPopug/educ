<?php //$faculty_id = ''; ?><!---->


<div>
    <h1>Cпециальности</h1>
    <a href="{{route('admin.specializations.create')}}">Создать группу специальностей</a>
    <form method="get" action="{{route("admin.specializations.specializations", ['$faculty_id' => $groupSpecialization])}}">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="faculty_id">Факультет</label><br />
                    <select name="faculty_id" class="form-control">
                        <option value="">Выберете факультет</option>
                        @foreach ($groupSpecialization as $key => $value)
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
            <th>Специальность</th>
            <th>Группа специальностей</th>
            <th>Факультет</th>
            <th>Дата редактирования</th>
            <th>Действия</th>
        </tr>
            @forelse ($specializations as $specialization)
            <tr>
                <td>{{$specialization->id}}</td>
                <td>{{$specialization->name_specialization}}</td>
                <td>{{$specialization->groupSpecialization->name_group_specialization}}</td>
                <td>{{$specialization->groupSpecialization->faculty->name_faculty}}</td>
                <td>{{$specialization->created_at}}</td>
                <td>{{$specialization->updated_at}}</td>
                <td>
                    <form action="{{route('admin.specializations.update', $specialization->id)}}" method="get">
                        @csrf
                        @method('UPDATE')
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                    <form action="{{route('admin.specializations.delete', $specialization->id)}}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>
            @empty
                <p>No specialization</p>
            @endforelse
    </table>
</div>
