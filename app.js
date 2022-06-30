const renderChart = (selector, type, data) => {
  const barChartCanvas = $(selector)[0];
  new Chart(barChartCanvas, {
    type,
    data: {
      labels: data.labels,
      datasets: [{
        label: 'Penilaian',
        backgroundColor: 'rgb(255, 99, 132)',
        data: data.penilaian,
        backgroundColor: data.colors
      }]
    }
  });
}

$(document).ready(function () {
  $('#data-table').DataTable({
    fnInitComplete: function (settings, { data }) {
      let labels = [];
      let penilaian = [];
      let colors = [];

      data.forEach((v) => {
        labels.push(v.nama);
        penilaian.push(v.penilaian);
        colors.push(v.color);
      });

      renderChart('#bar-chart', 'bar', { labels, penilaian, colors });
      renderChart('#line-chart', 'pie', { labels, penilaian, colors });
    },
    ajax: {
      url: '/api_json.php',
      dataSrc: 'data'
    },
    columns: [
      { data: 'nama' },
      { data: 'jabatan' },
      { data: 'penilaian' }
    ]
  });
});
