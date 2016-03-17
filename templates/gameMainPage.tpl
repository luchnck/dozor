<div>
    <h1>This is a game main page!</h1>
    <form id="checkTask" method="post" action="/game/checktask/{$teamid}">
        <div>{$task->title}</div>
        <div>{$task->details}</div>
        <div>{$task->opts}</div>
        <input type="text" name="pass" value="Ваш ответ"/>
        <input type="submit" value="Решить">
        <input type="button" value="Слить" onclick="document.location.href='/game/canceltask/{$teamid}'">
    </form>
</div>
