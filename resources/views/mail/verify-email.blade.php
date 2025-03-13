@component('mail::message')

<h1>Confirmação de email</h1>
<p>
Estamos agradecidos por você ter decido embarcar nessa jornada conosco. Agora, para darmos continuidade. Por favor confirme seu email clicando no botão abaixo.
</p>
@component('mail::button',['url'=>"$url", 'color' => "success"])
Confirmar email
@endcomponent

@component('mail::panel')
<p>Caso não consiga verificar sua conta, clique no link a seguir: <a href="{{ $url }}">{{$url}}</a></p>
@endcomponent

@endcomponent