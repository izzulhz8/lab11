<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "tourism_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch data for Domestic Visitors (Table 1)
$visitors_data = [];
$sql_visitors = "SELECT * FROM domestic_visitors";
$result_visitors = $conn->query($sql_visitors);

if ($result_visitors->num_rows > 0) {
    while($row = $result_visitors->fetch_assoc()) {
        $visitors_data[] = $row;
    }
}

// Fetch data for Domestic Tourists (Table 2)
$tourists_data = [];
$sql_tourists = "SELECT * FROM domestic_tourists";
$result_tourists = $conn->query($sql_tourists);

if ($result_tourists->num_rows > 0) {
    while($row = $result_tourists->fetch_assoc()) {
        $tourists_data[] = $row;
    }
}

// Prepare data for JavaScript
$components_visitors = array_column($visitors_data, 'component');
$year2010_visitors = array_column($visitors_data, 'year2010');
$year2011_visitors = array_column($visitors_data, 'year2011');

$components_tourists = array_column($tourists_data, 'component');
$year2011_tourists = array_column($tourists_data, 'year2011');

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Expenditure Analysis</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 30px;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 18px;
        }
        
        .charts-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .chart-box {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .chart-title {
            color: #2980b9;
            margin-bottom: 15px;
            text-align: center;
            font-size: 20px;
        }
        
        .chart-wrapper {
            height: 300px;
            position: relative;
        }
        
        .data-source {
            text-align: center;
            color: #95a5a6;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .db-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid #2980b9;
            font-size: 14px;
        }
        
        .db-title {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 500;
        }
        
        .db-title i {
            margin-right: 8px;
            color: #2980b9;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #7f8c8d;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Tourism Expenditure Analysis</h1>
            <p class="subtitle">BIC 21203 Web Development | Lab Assignment #4</p>
        </header>
        
        <div class="charts-container">
            <div class="chart-box">
                <h2 class="chart-title">Domestic Visitors Expenditure (2010-2011)</h2>
                <div class="chart-wrapper">
                    <canvas id="barChart"></canvas>
                </div>
                <p class="data-source">Data Source: Department of Statistics Malaysia</p>
            </div>
            
            <div class="chart-box">
                <h2 class="chart-title">Domestic Tourists Expenditure (2011)</h2>
                <div class="chart-wrapper">
                    <canvas id="pieChart"></canvas>
                </div>
                <p class="data-source">Data Source: Department of Statistics Malaysia</p>
            </div>
        </div>
        
        <div class="footer">
            <p>BIC 21203 Web Development | Semester 2 2024/2025</p>
            <p>Lab Assignment #4: Server Side Scripting with PHP Charts</p>
        </div>
    </div>

    <script>
        // Bar Chart Data (Table 1: Domestic Visitors) - FROM DATABASE
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($components_visitors); ?>,
                datasets: [
                    {
                        label: '2010 (RM million)',
                        data: <?php echo json_encode($year2010_visitors); ?>,
                        backgroundColor: '#3498db'
                    },
                    {
                        label: '2011 (RM million)',
                        data: <?php echo json_encode($year2011_visitors); ?>,
                        backgroundColor: '#2ecc71'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 13
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: RM ${context.raw.toLocaleString()} million`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Expenditure (RM million)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            callback: function(value) {
                                return 'RM ' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Expenditure Category',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });

        // Pie Chart Data (Table 2: Domestic Tourists 2011) - FROM DATABASE
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($components_tourists); ?>,
                datasets: [{
                    label: 'RM million',
                    data: <?php echo json_encode($year2011_tourists); ?>,
                    backgroundColor: [
                        '#3498db', '#2ecc71', '#e74c3c',
                        '#f39c12', '#9b59b6', '#1abc9c'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.chart.getDatasetMeta(0).total;
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: RM ${value.toLocaleString()} million (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>