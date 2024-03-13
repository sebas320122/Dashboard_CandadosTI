//Grafica 1: Incremento candados
const incrFechas = datosGraficas.map(entry => entry.Fecha);
const incrCandados = datosGraficas.map(entry => entry.Candados);

var incrDiaMes = [];
for(i=0;i<incrFechas.length;i++){
  var laFecha = new Date(incrFechas[i]);
  var fDia= laFecha.getDate();
  var fMes = laFecha.getMonth()+1;
  incrDiaMes[i]=`${fDia}/${fMes}`; 
}
incrDiaMes.reverse()

const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: incrDiaMes,
        datasets: [{
        label: 'Candados afectados',
        data: incrCandados.reverse(),
        borderWidth: 2,
        pointRadius:5
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            y: {
            beginAtZero: true
            }
        }
     
        
    }
});

//Grafica 2: Incremento registros
const incrRegistros = datosGraficas.map(entry => entry.Registros);

const ctx2 = document.getElementById('myChart2');
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: incrDiaMes,
        datasets: [{
        label: 'Registros',
        data: incrRegistros.reverse(),
        borderWidth: 2,
        pointRadius:5
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            y: {
            beginAtZero: true
            }
        }
        
    }
});

//Grafica 3
const areaNomb = datosGraficaCirc.map(entry => entry.Area);
const areaCandados = datosGraficaCirc.map(entry => entry.Candados);

const ctx3 = document.getElementById('myChart3');
new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: areaNomb,
          datasets: [{
            label: 'Candados',
            data: areaCandados,
            backgroundColor: [
              '#de4949',
              '#969592',
              '#be8d58',
              '#E1DC64',
              '#70C077',
              '#83DCD4',
              '#d6d6d6',
              '#4aa59d',
              '#fdc162',
              '#FBF330',
              '#7bf5b4',
              '#c47ec4'
            ],
            hoverOffset: 4
          }]
    },
    options: {
      maintainAspectRatio: false,
    responsive: true,
      scales: {
        y: {
          display:false
        }
      }
      
    }
  });