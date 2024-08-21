<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='csrf-token' content="{{ csrf_token() }}">

    <title>老虎堂刪除</title>
</head>
<body>
    <h2>刪除頁面</h2>
    <div>你想刪除誰？</div>
    <input type="text" id="delete">
    <button type="button" id="deleteBtn">確定刪除</button>
    <div>
        <a href="/">回首頁</a>
    </div>
    <script>
        const deleteBtn = document.querySelector('#deleteBtn');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        deleteBtn.addEventListener('click', function() {
            const deleteInput = document.querySelector('#delete');
            fetch('/delete-drink', {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken,
                },
                method: 'DELETE',
                body: JSON.stringify({
                    name: deleteInput.value,
                }),
            })
                .then(res => res.json())
                    .then(json => {
                        if (json.message === 'ok') {
                            alert('刪除成功');
                        } else {
                            alert('刪除失敗');
                        }
                    })
        });
    </script>
</body>
</html>