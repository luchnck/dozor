<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">Время напрячь мозги</h1>
        <p>Внимание вопрос:</p>
        <form id="checkTask" method="post" action="/game/checktask/{$teamid}">
            <div class="container">{$task->title}</div>
            <div class="container">{$task->details}</div>
            <div class="container">{$task->opts}</div>
            <div class="form-group">
                <label for="pass"> Ваш ответ?</label>
                <input type="text" name="pass" id="pass" class="form-control" value="Ваш ответ"/>
            </div>
            <div class="form-group">
                <button class="btn-lg btn-success" type="submit" value="Решить" >Решить</button>
                <button class="btn-lg btn-warning" type="button" value="Слить" onclick="document.location.href='/game/canceltask/{$teamid}'">Слить</button>
            </div>
        </form>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div>
