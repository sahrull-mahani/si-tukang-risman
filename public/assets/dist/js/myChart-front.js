// CHART
const dataStatistik = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        borderWidth: 1,
        hoverOffset: 5
    }]
}
const configStatistik = {
    type: 'pie',
    data: dataStatistik,
    options: {
        scales: {}
    }
}

const myStatistikChart = new Chart(
    $('#statistik'),
    configStatistik
)

sendFilter("agama")
$('#filter').on('change', function () {
    sendFilter(this.value)
})

function sendFilter(value) {
    $.post({
        url: location.origin + '/Web/api',
        data: { bidang: value },
        success: function (res) {
            let data = $.parseJSON(res)

            var statistik = [];
            var totalStatistik = [];

            $.each(data.statistikData, function (key, val) {
                statistik.push(val.statistik)
                totalStatistik.push(val.total)
            })

            $('#breadcrumb-item-last').text(value)

            myStatistikChart.config.data.labels = statistik
            myStatistikChart.config.data.datasets[0].data = totalStatistik
            myStatistikChart.update()
        }
    })
}