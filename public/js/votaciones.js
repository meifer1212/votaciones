function loadChart(url, cantidadPreguntas) {
    for (let i = 1; i <= cantidadPreguntas; i++) {
        $.ajax({
            url: url.replace('%%', i),
            method: 'GET',
        }).done(function (data) {
            console.log(data);
            datasets = [];
            const ctx = document.getElementById(`myChart${i}`).getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [`Resultado para la pregunta #${i}`],
                    datasets: [{
                        label: `${data.labels[0]}`,
                        data: [`${data.data[0]}`],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: `${data.labels[1]}`,
                        data: [`${data.data[1]}`],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: `${data.labels[2]}`,
                        data: [`${data.data[2]}`],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1

                    }
                ]
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
            alert('error, por favor revisa la consola.');
        });
    }
}
