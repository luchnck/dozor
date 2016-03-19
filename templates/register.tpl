<div class="jumbotron">
    <div class="container">
        <h1>Будем знакомы!</h1>
        Все поля обязательны для заполнения
    </div>
</div>
<div class="container">
    <form name="register-data" action="/register/go" method="POST">
      
      <div class="form-group">
        <label for="name">Логин</label>
        <input type="name" class="form-control" name="name" placeholder="Имя можно с цифрами">
      </div>  
        
      <div class="form-group">
        <label for="InputEmail">Email</label>
        <input type="email" class="form-control" name="email" placeholder="email@email.mail">
      </div>
      
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" name="pass" placeholder="Password">
      </div>
        
      <div class="form-group">
        <label for="verpassword">Пароль еще раз</label>
        <input type="password" class="form-control" name="verpass" placeholder="Password">
      </div>
        
      <input type="submit" value="Зарегистрироваться" class="btn btn-default">
      
    </form>
</div>