<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">Панель администратора</h1>
        <p>Сброс данных тестового приложения:</p>
        <form id="checkTask" method="post" action="/admin/resetTestData">
            <div class="container">сброс тестовых данных позволяет повторить тестовую игру с самого начала</div>
            <div class="form-group">
                <label for="pass"> Действительно сбросить данные?</label>
                <button class="btn-lg btn-success" type="submit" value="Решить" >Сбросить</button>
            </div>
        </form>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div>