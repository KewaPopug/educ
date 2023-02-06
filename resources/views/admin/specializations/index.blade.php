<?php //$faculty_id = ''; ?><!---->
<head>
    <meta name="csrf_token" content="{{csrf_token()}}" />
    <title>asd</title>
</head>

<div>
    <h1>Cпециальности</h1>
    <a href="{{route('admin.specializations.create')}}">Создать группу специальностей</a>
    <form method="get" action="{{route("admin.specializations.specializations", ['$faculty_id' => $groupSpecialization])}}">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="faculty_id">Факультет</label><br />
                    <select id='faculty_id' name="faculty_id" class="form-control" onchange="getGroupSpecialization(this)">
                        <option value="">Выберете факультет</option>
                        @foreach ($faculty as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="group_specialization_id">Группа Специальностей</label><br />
                    <select id='group_specialization_id' name="group_specialization_id" class="form-control" >
                        <option value="">Выберете группу специальности</option>
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
{{--                <td>{{$specialization->id}}</td>--}}
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
<script>
    function getGroupSpecialization(faculty_id){
        var request = new XMLHttpRequest();
        var params = "faculty_id="+faculty_id.value;
        var select = document.getElementById('group_specialization_id');
        var options = select.querySelectorAll('option');
        options.forEach(o => o.remove());

        request.open('POST', '{{route('admin.specializations.getGroupSpecialization')}}');
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf_token"]').getAttribute('content'));
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var GroupSpecializationList = JSON.parse(request.responseText);

                for (const [key, value] of Object.entries(GroupSpecializationList)) {
                    let option = document.createElement("option");
                    option.setAttribute("value", key);
                    option.text = value;
                    document.getElementById("group_specialization_id").appendChild(option);
                }
            }
        }
        request.send(params);
    }
</script>

