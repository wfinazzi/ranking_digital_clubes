<script>
        $(document).ready(function(){
            var base_url = $("#base_url").val();
            var clube = $("#clube").val();
            var municipio = $("#municipio").val();
            var url = base_url + "Coletas/clube_municipio/" + municipio;
            var coletas_clube = base_url + "Coletas/coletas_clube/" + clube;

            $.ajax({
                url: coletas_clube,
                type: "GET",
                dataType: "html"
            }).done(function(resultado) {
                var coletas = [];
                var valores = [];
                resultado = JSON.parse(resultado);           

                $.each(resultado.MESES, function( i, item ) {                 
                    coletas.push(item);                
                });

                $.each(resultado.COLETAS, function( i, item ) {                
                    valores.push(item);                
                });

                var datasets = [];
                var valores_rede = [];
                var COLORS = ['#1877f2','#c32aa3','#ff0000','#1da1f2','#acc236','#166a8f','#00a950','#58595b','#8549ba'];
                const random = Math.floor(Math.random() * COLORS.length);
                

                $.each(valores, function( i, item ) {                      
                    
                    var dataset = {
                        label : item.NOME,
                        backgroundColor: COLORS[i],
                        borderColor: window.chartColors.red,
                        fill: false,
                        data: Object.values(item.VALORES)
                    }
                    datasets.push(dataset);
                
                });       

                var barChartData = {
                    labels: coletas,
                    datasets: datasets
                };    

                var ctxb = document.getElementById('canvas').getContext('2d');
                window.myBar = new Chart(ctxb, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart - Stacked'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });            
                
            });
        });

		

		

    </script>