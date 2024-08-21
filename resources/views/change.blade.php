<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <h1>更新菜單</h1>
    <div>ID</div>
    <label>
        <input type="number" id="id">
    </label>
    <div>飲料名稱</div>
    <label>
        <input type="text" id="name">
    </label>
    <label>
        <div>飲料系列</div>
        <select id="type">
            @foreach ($drinkTypes as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </label>
    <div>冰的?</div>
    <label>
        <input type="radio" name="cold" id="coldYes" value="1">是
    </label>
    <label>            
        <input type="radio" name="cold" id="coldNo" value="0">否
    </label>
    <div>熱的?</div>
    <label>
        <input type="radio" name="hot" id="hotYes" value="1">是
    </label>
    <label>            
        <input type="radio" name="hot" id="hotNo" value="0">否
    </label>
    <div>
        <button type="button" id="update">更新飲料</button>
    </div>
    <script>
        const updateBtn = document.querySelector('#update');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        updateBtn.addEventListener('click', function() {
            const idInput = document.querySelector('#id');
            const nameInput = document.querySelector('#name');
            const typeInput = document.querySelector('#type');
            const coldInput = document.querySelector('input[name="cold"]:checked');
            const hotInput = document.querySelector('input[name="hot"]:checked');
            fetch('/update-drink', {
                headers: {
                    'Content-Type' : 'application/json',
                    'X-CSRF-Token' : csrfToken,
                },
                method: 'PUT',
                body: JSON.stringify({
                    id: Number(idInput.value),
                    type_id: Number(typeInput.value),
                    name: nameInput.value,
                    cold: Number(coldInput.value),
                    hot: Number(hotInput.value), 
                }),
            })
                .then(res => res.json())
                    .then(json => {
                        if (json.message === 'ok') {
                            alert('更新成功');
                        } else {
                            alert('更新失敗');
                        }
                    });
        });
    </script>
</body>
</html>