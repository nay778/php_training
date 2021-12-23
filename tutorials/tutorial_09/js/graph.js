$(document).ready(function () {
    $.ajax({
    url: "graph_script.php",
    method: "GET",
    success: function(data){
        console.log(data);

        var name = [];
        var slae_rate = [];

        for (var i in data) {
            name.push(data[i].name);
            slae_rate.push(data[i].sale_rate);
        }

        var chartdata = {

        labels: name,
        datasets: [{
            label: '# sale rate',
            data: slae_rate,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
        };

        var ctx = $("#myChart");
        var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
            responsive: true,
            plugins: {
            title: {
                display: true,
                text: '-- - --'
            },
            },
            interaction: {
            intersect: false,
            },
            scales: {
            x: {
                display: true,
                title: {
                display: true
                }
            },
            y: {
                display: true,
                title: {
                display: true,
                text: 'Value'
                },
                suggestedMin: -10,
                suggestedMax: 200
            }
            }
        },
        });
    },
    error: function(data) {
        console.log(data);
    }
    });  
});
