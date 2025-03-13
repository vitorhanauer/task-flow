<x-mail::message>

<h1>Criação de uma nova tarefa</h1>
<x-mail::panel>
Olá {{$username}}, gostariamos de informar que uma nova tarefa foi criada.
</x-mail::panel>

<x-mail::button :url="$url" color="success">
Visualizar tarefas
</x-mail::button>

</x-mail::message>