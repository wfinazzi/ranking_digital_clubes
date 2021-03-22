<script  src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready( function () {
        $('.tabela_lista').DataTable();
    } );

    $('.valor').mask('99.999.999', {reverse: true});

    $('.editar_divisao').click(function() {

        var divisao = $(this).data('divisao');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'divisoes/editar/'+divisao,
            async: true,
            data: divisao,
            success: function(response) {
                $("#divisoesModal").modal('show');
                $("#id").val(response.ID);
                $("#divisao").val(response.TITULO);
                console.log(response);
            }
        });

        return false;
    });

    $('.editar_clube').click(function() {

        var clube = $(this).data('clube');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'clubes/editar/'+clube,
            async: true,
            data: clube,
            success: function(response) {
                $("#clubesModal").modal('show');
                $("#id").val(response.ID);
                $("#clube").val(response.CLUBE);
                $("#nome_completo").val(response.NOME_COMPLETO);
                $("#divisao").val(response.DIVISAO);
                $("#municipio").val(response.MUNICIPIO); 
                $("#link_facebook").val(response.LINK_FACEBOOK);
                $("#link_instagram").val(response.LINK_INSTAGRAM);
                $("#link_youtube").val(response.LINK_YOUTUBE);
                $("#link_twitter").val(response.LINK_TWITTER);
            }
        });

        return false;
    });

    $('.editar_municipio').click(function() {

        var municipio = $(this).data('municipio');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'municipios/editar/'+municipio,
            async: true,
            data: municipio,
            success: function(response) {
                $("#municipiosModal").modal('show');
                console.log(response);
                $("#id").val(response.ID);
                $("#municipio").val(response.MUNICIPIO);
                $("#populacao").val(response.POPULACAO);
                $("#idh").val(response.IDH);
                $("#pib").val(response.PIB);                
            }
        });

        return false;
    });

    $('.editar_rede').click(function() {

        var rede = $(this).data('rede');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'redessociais/editar/'+rede,
            async: true,
            data: rede,
            success: function(response) {
                $("#redesModal").modal('show');
                $("#id").val(response.ID);
                $("#nome").val(response.NOME);

                console.log(response);
            }
        });

        return false;
    });

</script>

</html>