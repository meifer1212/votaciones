function loadChart(url, cantidadPreguntas) {
    for (let $i = 1; $i <= cantidadPreguntas; $i++) {
        $.ajax({
            url: url.replace('%%', $i),
            method: 'GET',
        }).done(function (data) {
            // return console.log(data);
            const ctx = document.getElementById(`myChart${$i}`).getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: `Total ${data.votantes} Votantes`,
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }).fail(function (error) {
            console.log(error);
        });
    }
}
