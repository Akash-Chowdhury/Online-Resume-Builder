
<main class="form-signin w-100 m-auto text-center">
  <form  method="post" action="<?=$action->helper->url('action/login')?>">
    <img class="mb-4" src="<?=$action->helper->loadimage('cv.png')?>" alt="CV - online" width="80">
    <h1 class="h3 mb-3 fw-normal">login Your Account</h1>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" >
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" >
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">login</button>
    <a href="<?=$action->helper->url('signup')?>"> <p class="my-3">Don't have any account ?</p></a>
  </form>
</main>
