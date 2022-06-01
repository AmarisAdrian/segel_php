$("#frmlogin").bind('submit', function () {
    var btnenviar = $('#btnenviar');
    var loader = $('.loader');
    $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data: $(this).serialize(),
        beforeSend: function () {
            btnenviar.val("Enviando");
            loader.show();
            btnenviar.attr("disabled", "disabled");
        },
        success: function (data) {
            if (data == false) {
                $("#MensajeError").load('./?action=requestmensaje');
                $(data).html({
                    show: true
                });
                loader.hide();
            } else {
                location.reload();
                loader.hide();
            }
        },
        complete: function (data) {
            btnenviar.val("Iniciar sesion");
            btnenviar.removeAttr("disabled");
            loader.hide();

        },
        error: function (e) {
            alert("Problemas al tratar de enviar el formulario");
            loader.hide();
        }
    });
    return false;
});

$(document).ready(function() {
  let ctx1 = document.getElementById("barChartZona").getContext('2d');
    let loader = $('.loader');
    $.ajax({
      url: "./?json=chart/ChartPie",
      dataType: 'JSON',
      contentType: "application/json; charset=utf-8",
      method: "POST",
      beforeSend: function () {
        loader.show();
      },
      success: function (data) {
        let response = JSON.parse(data);
        let nombre = [];
        let cantidad = [];     
        loader.hide();          
        for (var i in response) {
         /* nombre.push(data[i].nombre);
          cantidad.push(data[i].cantidad);*/
        }
        let chartdata = {
          labels: [nombre,"enero","febrero"],
          datasets: [{
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
            label: [nombre],
            data: [cantidad], 
            borderWidth: 1
          }],
      };
      var grafico = new Chart(ctx1, {
        type: 'pie',
        data: chartdata,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    },
      error: function (xhr,thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        loader.hide();
      }
    });
  });
  
  // pieChart
/*var ctx3 = document.getElementById("pieChartPuesto").getContext('2d');
  var pieChart = new Chart(ctx3, {
    type: 'pie',
    data: {
        datasets: [{
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          label: 'Dataset 1'
        }],
        labels: [
          "Red",
          "Orange",
          "Yellow",
          "Green",
          "Blue"
        ]
      },
      options: {
        responsive: true
      }
  });*/
  
    
  
        
  