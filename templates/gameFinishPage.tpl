<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">Игра окончена</h1>
        <p>Можно немного расслабиться и перевести дух, окончательные результаты 
            будут доступны после завершения игры по расписанию</p>
        <h2>Таблица первенства:</h2>
        <table class="table table-striped">
            
            <thead>
                <th>Команда</th>
                <th>Статус</th>
                <th>Очки</th>
            </thead>
            <tbody>
                {foreach from=$challengeState->arrayRecords item=record}
                    <tr {if $record->teamid eq $teamid} class="success" {/if}>
                        <td>{$record->name}</td>
                        <td>{if $record->taskserials eq ""}Закончено{else}В процессе{/if}</td>
                        <td>{$record->timescore}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div>
