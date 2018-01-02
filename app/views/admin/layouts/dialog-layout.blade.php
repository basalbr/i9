@if (Session::has('message'))
    <div id="alertBox" style="display: none; text-align: center; vertical-align: central;" title="{{Session::get('message.title')}}">{{Session::get('message.msg')}}</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#alertBox").dialog({
                modal: true,
                buttons: {
                    "Ok": function() {
                        $(this).dialog("close");
                    }
                },
                resizable: false
            });
        })
    </script>
{{Session::forget('message')}}
@endif
<div id="confirmBox" style="display: none; text-align: center; vertical-align: central;" title="Confirmar exclusão">Tem certeza que quer excluir o registro?</div>
<script type="text/javascript">
    $('a.del').on('click', function(ev) {
        var destino = $(this).attr('href')
        ev.preventDefault();
        $("#confirmBox").dialog({
            modal: true,
            buttons: {
                "Sim": function() {
                    window.location.replace(destino);
                    $(this).dialog("close");
                },
                "Não": function() {
                    $(this).dialog("close");
                }
            },
            resizable: false
        });
    })

</script>