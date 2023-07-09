
<main class="form-signin w-100 m-auto text-center">
  <form  method="post" action="<?=$action->helper->url('action/signup')?>">
    <img class="mb-4" src="<?=$action->helper->loadimage('cv.png')?>" alt="CV - online" width="80">
    <h1 class="h3 mb-3 fw-normal">Create New Account</h1>

    <div class="form-floating">
      <input type="name" name="full_name" class="form-control" id="floatingInput" placeholder="Akash Chowdhury" >
      <label for="floatingInput">Full Name</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" >
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" >
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    <a href="<?=$action->helper->url('login')?>"> <p class="my-3">Already have an account ?</p></a>
  </form>
</main>
