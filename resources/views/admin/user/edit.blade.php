<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_modal.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">


</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../../../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action="{{ route('admin.user.update', $data_person->slug) }}" method="post" class="form form--employee">
            @csrf

            @method('PUT')

            <input type="hidden" value = "{{ $data_user->user_id }}" name="user_id">
            <h1 class="form__title">
                <b> Agregar empleado</b>
            </h1>       
            
            @if (session('alert-success-update-data'))
                <div class="alert alert-success">
                    {{ session('alert-success-update-data') }}
                </div>
            @endif 
            <fieldset class="form__block form__data--employee">
                <legend class="form__subtitle"><b>Datos Personales</b></legend>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Nombre y apellido</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('name_lastname') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="name_lastname" class="form-control @error ('name_lastname') is-invalid @enderror"
                            placeholder="Yaneri Perdomo" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{$data_person->name}} {{ $data_person->lastname }}">
                    </div>
                    @error('name_lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Cédula de identidad</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text p-0 @error ('cedula') is-invalid--border @enderror" id="basic-addon1">
                            <div class="input-group">
                                <select id="type-indicator" name="identity_card_id" class="form-control form__select " >
                                    <option value="" disabled>Seleccione una opción</option>
                                    @if ($data_person)
                                        <option value="1" @if($data_person->identity_card_id == 1) selected @endif> Venezolano cedulado (V) </option>
                                        <option value="2" @if($data_person->identity_card_id == 2) selected @endif> Extranjero cedulado (E)</option>
                                        <option value="3" @if($data_person->identity_card_id == 3) selected @endif> Pasaporte</option>
                                    @else
                                        <option value=""> No se encontraron datos de persona </option>
                                    @endif
                                </select>
                            </div>
                        </span>
                        <input type="text" name="cedula" class="form-control @error ('cedula') is-invalid @enderror  "
                            placeholder="87654321" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_person->cedula }}">
                    </div>
                    @error('cedula')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Correo electronico</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('email') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="search" name="email" class="form-control @error ('email') is-invalid @enderror "
                            placeholder="m@example.com" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_user->email }}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="gender_id" class="form__label form__label--required">Genero</label>
                    <div class="input-group w-100">
                        <span class="form__icon input-group-text p-0 w-100" id="basic-addon1">
                            <div class="input-group">
                                <select id="gender_id" name="gender_id" class="form-control form__select " required>
                                     <option value="" disabled>Seleccione una opción</option>
                                    @if ($data_person)
                                        <option value="1" @if($data_person->gender_id == "1") selected @endif> F </option>
                                        <option value="2" @if($data_person->gender_id == "2") selected @endif> M</option>
                                    @else
                                        <option value=""> No se encontraron datos de persona </option>
                                    @endif
                                </select>
                            </div>
                        </span>
                    </div>
                </div>
               
                <div class="form__item">
                    <label for="number" class="form__label ">Numero</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('number') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text"
                            id="number"
                            name="number"
                            class="form-control
                            @error ('number') is-invalid @enderror "
                            placeholder="+584739997" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_person->number }}">
                    </div>
                    @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>
            <fieldset class="form__block form__data--user">
                <legend class="form__subtitle" ><b>Datos de Usuario</b></legend>
                <div class="form__item form__item--avatar">
                    <label for="" class="form__label">Selecciona un avatar</label>
                    <p class="d-flex gap-2 form__avatar-content flex-wrap">
                        <label for="1" data-checked="true">
                            <input type="radio"class="input-radio--hidden "
                                id="1" name="avatar_id" value="1" @if ($data_person->avatar_id == 1)
                                checked
                                @endif>
                            <img src="../../img/avatares/default.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 1)
                                                 checked
                                             @endif "
                                @if ($data_person->avatar_id == 1)
                                                 data-checked="true"
                                @endif>
                        </label>
                        <label for="2">
                            <input type="radio" id="2" name="avatar_id" @if ($data_person->avatar_id == 2)
                                checked
                            @endif value="2" class="input-radio--hidden">
                            <img
                                src="../../img/avatares/boy.png"
                                alt=""
                                class="form__avatar-img
                                @if ($data_person->avatar_id == 2)
                                    checked
                                @endif "
                                @if ($data_person->avatar_id == 2)
                                    data-checked="true"
                                @endif>
                        </label>
                        <label for="3">
                            <input type="radio" id="3" name="avatar_id" value="3" @if ($data_person->avatar_id == 3)
                                checked
                            @endif class="input-radio--hidden">
                            <img src="../../img/avatares/girl.png" alt="" class="form__avatar-img
                                @if ($data_person->avatar_id == 3)
                                    checked
                                @endif "
                                @if ($data_person->avatar_id == 3)
                                    data-checked="true"
                                @endif
                                >
                        </label>
                        <label for="4">
                            <input type="radio" id="4" name="avatar_id"@if ($data_person->avatar_id == 4)
                                checked
                            @endif value="4" class="input-radio--hidden" >
                            <img src="../../img/avatares/dinosaur.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 4)
                                                 checked
                                             @endif "
                                @if ($data_person->avatar_id == 4)
                                                 data-checked="true"
                                @endif>
                        </label>
                        <label for="5">
                            <input type="radio" id="5" name="avatar_id"@if ($data_person->avatar_id == 5)
                                checked
                            @endif value="5" class="input-radio--hidden">
                            <img src="../../img/avatares/young-snow-m.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 5)
                                                 checked
                                             @endif "
                                @if ($data_person->avatar_id == 5)
                                                 data-checked="true"
                                @endif>
                        </label>
                        <label for="6">
                            <input type="radio" id="6" name="avatar_id" @if ($data_person->avatar_id == 6)
                                checked
                            @endif value="6" class="input-radio--hidden">
                            <img src="../../img/avatares/young-snow-f.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 6)
                                                 checked
                                             @endif "
                                @if ($data_person->avatar_id == 6)
                                                 data-checked="true"
                                @endif>
                        </label>
                    </p>
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Usuario</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('user') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="user" class="form-control @error ('user') is-invalid @enderror"
                            placeholder="Yane2024" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_user->user }}">
                    </div>
                    @error('user')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
               
                <div class="form__item text-center">
                    <button type="button" class=" button--update-password button text--color-black" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Establecer nueva contraseña
                        </span>
                    </button>
                </div>
            </fieldset>
            <hr class="form__line">
            <div class="form__option-button form__button w-100">
                <button class="button button--color-blue w-100 " type="submit">
                    Actualizar cuenta
                </button>
            </div>
        </form>
    </main>
    
 
<script>
    
    document.addEventListener('DOMContentLoaded', e => {
          $alert_changes_password = document.querySelector('.alert-success--changes-password') ?? null;
          $alert_changes_password_input = document.querySelector('.alert-danger--password') ?? null;
          $alert_changes_password_confirmation_input = document.querySelector('.alert-danger--password_confirmation') ?? null;

            if($alert_changes_password_input != null || $alert_changes_password_confirmation_input != null
            || $alert_changes_password != null){
                console.info('desde la alert de contreseña');
                var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                myModal.show();
            };

         
          
    });
</script>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('admin.user.update-password', $data_person->slug) }}" class="" method="post">
      <div class="modal-header modal-header--bg-red flex-column">
         @csrf
                    @method('PUT')
                    <legend><b>Seguridad</b></legend>
                    <div class="w-100">
                         <span>Actualiza tu contraseña</span>
                    </div>
                  
      </div>
      <div class="modal-body">
          @if (session('alert-success-update-password'))
                    <div class="alert alert-success alert-success--changes-password">
                        {{ session('alert-success-update-password') }}
                    </div>
                    @endif
         <div class="form__item">
                        <label for="" class="form__label form__label--required">Contraseña</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('password') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror"
                                placeholder="*******" aria-label="Username"
                                aria-describedby="basic-addon1"
                                value="">
                        </div>
                        @error('password')
                        <div class="alert alert-danger alert-danger--password">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Confirmar contraseña</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('password_confirmation') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="password" name="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror "
                                placeholder="*******" aria-label="Username"
                                aria-describedby="basic-addon1"
                                value="">
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger alert-danger--password-confirmation">{{ $message }}</div>
                        @enderror
                    </div>
      </div>
      <div class="modal-footer">
         <div class="form__button flex-full__justify-content-end gap-2">
             <button type="button" class="button button--color-grey" data-bs-dismiss="modal">Cerrar</button>
                        <button class="button button--color-red" type="submit">
                            Guardar cambios
                        </button>
                    </div> 
      </div>
                        </form>
    </div>
  </div>
</div>
<script>
     let $all_avatar_img = document.querySelectorAll(".form__avatar-content > label > img");
    
    document.addEventListener('click', e => {

        if (e.target.matches(".form__avatar-content > label > img")) {
            for (let i = 0; i < $all_avatar_img.length; i++) {
                $all_avatar_img[i].removeAttribute("data-checked");
                $all_avatar_img[i].classList.remove("checked")
                $all_avatar_img[i].removeAttribute('checked');
            }

            e.target.classList.add("checked");
            e.target.setAttribute("data-checked", "true");
            for(i=0; i < 6;i++){
            if($all_avatar_img[i].getAttribute('data-checked')){
                $all_avatar_input.setAttribute('checked')
            }
        }
        }
    })
    
    let $all_avatar_input = document.querySelectorAll('[type="radio"]');
    document.addEventListener('DOMContentLoaded', e =>{
        for(i=0; i < 6;i++){
            if($all_avatar_img[i].getAttribute('data-checked')){
                $all_avatar_input.setAttribute('checked')
            }
        }
    })
</script>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>