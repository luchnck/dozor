<div class="jumbotron">
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>Этот сайт несет счастье и радость миролюбивым жителям Новокуйбышевска, 
            если ты хочешь стать немного счастливее Войди или Зарегистрируйся и будет тебе счастье!</p>
    </div>
</div>
    <div class="col-md-3 col-xs-2 col-lg-3"></div>

        <div class="col-md-6 col-xs-8 col-lg-6 panel">
            <h1>Список доступных игр на сегодня</h1>
            <table class="table table-striped">
                
                <thead>
                    <td>Название</td>
                    <td>Начало</td>
                    <td>Участники</td>
                    {if $teamid}<td>Присоединиться</td>{/if}
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
      

     