{if $loginform eq 1}
    <form class="navbar-form navbar-right" role="form" action="/main/auth" method="POST">
            <div class="form-group">
              <input type="text" name="username" placeholder="Логин" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Пароль" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Войти</button>
    </form>
{else}
    <form class="navbar-form navbar-right" role="form" action="/main/logout/" method="POST">
            <div class="form-group">
                <div class="btn btn-sm btn-default">Профиль</div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-lg btn-info" onclick="document.location.href='/profile/view/'">{$TeamName}</button>  
            </div>
            <button type="submit" class="btn btn-success">Выйти</button>
    </form>
{/if}