<div class="jumbotron">
    <div class="container">
        
            <h1>Помни, на что подписался!</h1>
            <p class="text-justify">Сверь даты игр, в которых участвуешь, 
                свои контактные данные, чтобы не прозевать самое интересное</p>
    
    </div>
</div>

<div class="container panel panel-info">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 "> 
        <h3>СПИСОК ИГР, В КОТОРЫХ УЧАВСТВУЕШЬ</h3>
        
        <table class="table table-striped text-center table-hover">
            
            <thead>
                <th>Игра</th>
                <th>Начало</th>
                <th>Участники</th>
                <th>Войти</th>
            </thead>
            <tbody>
                {foreach from=$games->arrayRecords item=record}
                    <tr>
                        <td>{$record->caption}</td>
                        <td>{$record->start->getDate()}</td>
                        <td>{$record->teamslist}</td>
                        <td>
                            <form action="/game/go/" method="POST">
                                <button class="btn btn-success" type="submit" ><span class="glyphicon glyphicon-play-circle"></span></button>
                                <input type="hidden" name="game-num" value="{$record->id}">
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        </div>    
            
            <div class="col-md-2 col-xs-2 col-lg-2"></div>
                
</div>
        