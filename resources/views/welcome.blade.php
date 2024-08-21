<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='csrf-token' content="{{ csrf_token() }}">
        <title>老虎堂</title>
    </head>
    <body>
        <h1>老虎堂</h1>
        <div class="container">
            <label>
                <div>飲料名稱</div>
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
                <button type="button" id="saveBtn">儲存飲料</button>
            </div>
            <a href="/delete">刪除頁面</a>
            <a href="/list">飲料菜單</a>
            <a href="/change">更新菜單</a>
        </div>
    <script>
        const saveBtn = document.querySelector('#saveBtn');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        saveBtn.addEventListener('click', function() {
            const nameInput = document.querySelector('#name');
            const typeInput = document.querySelector('#type');
            const coldInput = document.querySelector('input[name="cold"]:checked');
            const hotInput = document.querySelector('input[name="hot"]:checked');
            fetch('/create-drink', {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken,
                },
                method: 'POST',
                body: JSON.stringify({
                    type_id: Number(typeInput.value),
                    name: nameInput.value,
                    cold: Number(coldInput.value),
                    hot: Number(hotInput.value), 
                }),
            })
                .then(res => res.json())
                    .then(json => {
                        if (json.message === 'ok') {
                            alert('新增成功');
                        } else {
                            alert('新增失敗');
                        }
                    });
            nameInput.value = '';
            coldInput.checked = false;
            hotInput.checked = false;
        });
    </script>
    </body>
</html>
