<div class="jumbotron">
    {if $checkauth}
        <div class="container">
        <h1>Привет, ребятки!</h1>
        <p class="text-justify">Похоже Вы уже вкурсе что здесь к чему.<br>
            Если нет, добавляйтесь в любую из доступных игр ниже или проверьте 
            <button type="button" onclick="document.location.href='profile/view/';" class="btn btn-info">Профиль</button><br>
            возможно Ваша игра уже началась!</p>
    </div>
    {else}
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>Этот сайт несет счастье и радость миролюбивым жителям Новокуйбышевска, 
            если ты хочешь стать немного счастливее Войди или 
            <button type="button" onclick="document.location.href='register/view/';" class="btn btn-success btn-lg">Зарегистрируйся</button> 
            и будет тебе счастье!</p>
    </div>
    {/if}
</div>
    <div class="col-md-3 col-xs-2 col-lg-3"></div>

        <div class="col-md-6 col-xs-8 col-lg-6 panel">
            <h1 class="text-center">Список доступных игр</h1>
            <table class="table table-striped">
                
                <thead>
                    <th>Название</th>
                    <th>Начало</th>
                    <th>Участники</th>
                    {if $teamid}<th>Присоединиться</th>{/if}
                </thead>
                <tbody>
                    {foreach from=$games->arrayRecords item=record}
                        <tr>
                            <td>{$record->caption}</td>
                            <td>{$record->start->getDate()}</td>
                            <td>{$record->teamlist}</td>
                            {if $teamid}
                            <td>
                                <form name="joingame" action="/main/join/team/{$teamid}">
                                    <input type="submit" value="+">
                                    <input type="hidden" value="{$record->id}">
                                </form>
                            </td>
                            {/if}
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>

        <div class="col-md-3 col-xs-2 col-lg-3"></div>
      

     