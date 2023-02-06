<h1>Cпециальность</h1>
<form method="post" action="{{(isset($specializations->id)) ? route("admin.specializations.update",['user_id' => $specializations->id] ) : route("admin.specializations.create")}}">
    @csrf
    <label for="name_specialization">Название группы специальностей</label><br />
    <input name="name_specialization" id="name_specialization" type="text" placeholder="Название специальности" value="{{(isset($specializations->name_specialization)) ? $specializations->name_specialization : ''}}"/><br />

    <label for="specialization_reduction">Сокращение специальности</label><br />
    <input name="specialization_reduction" id="specialization_reduction" type="text" placeholder="Сокращение специальности" value="{{(isset($specializations->specialization_reduction)) ? $specializations->specialization_reduction : ''}}"/><br />

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
        <button>Отправить</button>
        </div>
    </div>
</form>
        <script>
            function getGroupSpecialization(faculty_id){
                var request = new XMLHttpRequest();
                var params = "faculty_id="+faculty_id.value;

                request.open('POST', '{{route('admin.specializations.getGroupSpecialization')}}');
                {{--request.open('GET', '{{route('admin.specializations.getGroupSpecialization')}}'+params, true);--}}
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
