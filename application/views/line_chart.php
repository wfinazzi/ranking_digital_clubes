<script>

    $(document).ready(function(){
        var base_url = $("#base_url").val();
        var clube = $("#clube").val();
        var municipio = $("#municipio").val();
        var url = base_url + "Coletas/clube_municipio/" + municipio;
        var coletas_clube = base_url + "Coletas/coletas_clube/" + clube;

    
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html"
        }).done(function(resultado) {
            var coletas = [];
            var valores = [];
            resultado = JSON.parse(resultado);            

            var datasets = [];
            var valores_rede = [];
            var COLORS = ['#1877f2','#c32aa3','#ff0000','#1da1f2','#acc236','#166a8f','#00a950','#58595b','#8549ba'];
            

            $.each(resultado, function( i, item ) {  

                const random = Math.floor(Math.random() * COLORS.length);
                               
                
                var dataset = {
                    label : item.CLUBE,
                    backgroundColor: COLORS[random],
                    borderColor: COLORS[random],
                    fill: false,
                    data: Object.values(item.ACUMULADOS)
                }
                datasets.push(dataset);                
            });      

            var config = {
                    type: 'line',
                    data: {
                        labels: coletas,
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Chart.js Line Chart'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Month'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value'
                                }
                            }]
                        }
                    }
                };           

            var ctxl = document.getElementById('canvas_line').getContext('2d');
            window.myLine = new Chart(ctxl, config);       
            
        });    
    });

            
            

            
        
            

            
		

        

		

		

    </script>