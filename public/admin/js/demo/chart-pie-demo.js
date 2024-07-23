// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [], 
        datasets: [{
            data: [], 
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += context.raw.toLocaleString();
                        return label;
                    }
                }
            }
        },
        animation: {
            onComplete: function() {
                var legends = document.getElementById('legend-container');
                legends.innerHTML = ''; // Clear existing legend content
                myPieChart.data.labels.forEach(function(label, index) {
                    var backgroundColor = myPieChart.data.datasets[0].backgroundColor[index];
                    var iconClass = getIconClassByColor(backgroundColor);
                    legends.innerHTML += '<span class="mr-2"><i class="' + iconClass + '"></i> ' + label + '</span>';
                });
            }
        }
    }
});

// Function to update pie chart
function updatePieChart(labels, data, eventClasses) {
    myPieChart.data.labels = labels;
    myPieChart.data.datasets[0].data = data;
    myPieChart.update();

    // Update legend dynamically based on event classes
    var legends = document.getElementById('legend-container');
    legends.innerHTML = ''; // Clear existing legend content
    labels.forEach(function(label, index) {
        var backgroundColor = myPieChart.data.datasets[0].backgroundColor[index];
        var iconClass = getIconClassByColor(backgroundColor);
        var eventClass = eventClasses[index]; // Assuming eventClasses array corresponds to labels
        legends.innerHTML += '<span class="mr-2"><i class="' + iconClass + '"></i> ' + eventClass + '</span>';
    });
}

// Function to get icon class based on background color
function getIconClassByColor(backgroundColor) {
    switch (backgroundColor) {
        case '#4e73df':
            return 'fas fa-circle text-primary';
        case '#1cc88a':
            return 'fas fa-circle text-success';
        case '#36b9cc':
            return 'fas fa-circle text-info';
        default:
            return 'fas fa-circle'; 
    }
}
    