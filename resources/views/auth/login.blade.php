@extends('layouts.auth')

@section('header')
    <title>Login - PAGE</title>
@endsection
@section('content') 
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div> 
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar sesión</p> 
      <form name="form-login" id="form" >
        <div class="input-group mb-3">
          <input type="email" autocomplete="off" name="email"   class="form-control " placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"   class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuérdame
              </label>
            </div> --}}
          </div> 
          <div class="col-5">
            <button type="submit" id="btnlogin" class="btn btn-primary btn-block">
                Ingresar
                <span class="spinner-border spinner-border-sm d-none" id="loadingbtn" role="status" aria-hidden="true"></span>
            </button>
          </div> 
        </div>
      </form>

      {{-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}} 

      {{-- <p class="mb-1"> --}} 
        {{-- <a href="forgot-password.html">Olvidé mi contraseña</a> --}}
       
      {{-- </p> --}}
      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div> 
    <div id="message" class="my-0  card-footer bg-danger text-center br-footer pt-0 pb-1">
        {{-- <small>Usuario o Contraseña son incorrectos</small> --}}
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    let formLogin = document.forms['form-login'] ; 
    (()=>{

    })();
    document.getElementById('form').addEventListener('submit',function(event){
        event.preventDefault()
        let data = {
            email:formLogin.email.value,
            password:formLogin.password.value
        }  
        // let data = new FormData()
        // data.append('email',"formLogin.email.value")
        // data.append('passowrd',"formLogin.password.value")
        let options = {
            method:'POST',
            body: JSON.stringify(data),
            headers:{
                // 'csrf-token': window.csrf || '',
                'Accept': 'application/json',
                'Content-Type': 'application/json' //'Content-Type':'application/x-www-form-urlencoded'
            }
        }
        btnlogin.disabled=true
        loadingbtn.classList.remove('d-none')
        fetch('auth/login',options)
        .then(res=>{
            if(res.ok){
                return res.json()
            }else{ throw 'Error en la llamada ajax'}
        })
        .then(data=>{
            loadingbtn.classList.add('d-none')
            if(data.success){
                console.log(data)
                btnlogin.disabled=false
                window.location.href = '/dashboard'

            }else{
                document.getElementById('message').innerHTML = "<small>"+data.message+"</small>"
            }
        })
        .catch(error => console.error('Error:', error))
        
        console.log(event)
    })
</script>
@endsection