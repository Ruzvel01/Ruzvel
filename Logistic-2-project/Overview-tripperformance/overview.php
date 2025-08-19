<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Performance Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../main/style.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f8f9fa;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
          
        .performance-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .performance-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .performance-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 1rem 1.5rem;
        }

        .metric-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .metric-label {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .progress-circle {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .progress-circle svg {
            transform: rotate(-90deg);
        }

        .progress-circle .progress-ring {
            fill: none;
            stroke: #e9ecef;
            stroke-width: 8;
        }

        .progress-circle .progress-value {
            fill: none;
            stroke: var(--success-color);
            stroke-width: 8;
            stroke-linecap: round;
            transition: stroke-dasharray 1s ease;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .trip-item {
            border-left: 4px solid var(--secondary-color);
            background: white;
            border-radius: 0 10px 10px 0;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .trip-item:hover {
            border-left-color: var(--success-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .chart-container {
            position: relative;
            height: 300px;
            background: white;
            border-radius: 15px;
            padding: 1rem;
        }

        .icon-bg {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .icon-bg.primary { background: rgba(52, 152, 219, 0.1); color: var(--secondary-color); }
        .icon-bg.success { background: rgba(39, 174, 96, 0.1); color: var(--success-color); }
        .icon-bg.warning { background: rgba(243, 156, 18, 0.1); color: var(--warning-color); }
        .icon-bg.danger { background: rgba(231, 76, 60, 0.1); color: var(--danger-color); }

        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .metric-value {
                font-size: 2rem;
            }
            
            .header-section h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <?php
    include('../includes/sidebar.php')
    ?>
   <!-- Sidebar -->
   

<div class="main-content">

    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-2"><i class="fas fa-route me-3"></i>Trip Performance Overview</h1>
                    <p class="mb-0">Comprehensive analysis of your travel efficiency and performance metrics</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex flex-column">
                        <small>Last Updated</small>
                        <span id="lastUpdated" class="fw-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label class="form-label">Time Period</label>
                    <select class="form-select" id="timePeriod">
                        <option value="7">Last 7 Days</option>
                        <option value="30" selected>Last 30 Days</option>
                        <option value="90">Last 90 Days</option>
                        <option value="365">Last Year</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Vehicle Type</label>
                    <select class="form-select" id="vehicleType">
                        <option value="all">All Vehicles</option>
                        <option value="car">Cars</option>
                        <option value="truck">Trucks</option>
                        <option value="motorcycle">Motorcycles</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Route Type</label>
                    <select class="form-select" id="routeType">
                        <option value="all">All Routes</option>
                        <option value="urban">Urban</option>
                        <option value="highway">Highway</option>
                        <option value="mixed">Mixed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label"> </label>
                    <button class="btn btn-primary w-100" onclick="applyFilters()">
                        <i class="fas fa-filter me-2"></i>Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Key Performance Indicators -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-bg primary mx-auto">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="metric-value">1,247</div>
                        <div class="metric-label">Total Distance (km)</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-primary" style="width: 78%"></div>
                        </div>
                        <small class="text-muted">78% of monthly target</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-bg success mx-auto">
                            <i class="fas fa-gas-pump"></i>
                        </div>
                        <div class="metric-value">7.2</div>
                        <div class="metric-label">Avg Fuel Efficiency (L/100km)</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                        <small class="text-success">15% improvement</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-bg warning mx-auto">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="metric-value">42.5</div>
                        <div class="metric-label">Avg Trip Duration (hrs)</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-warning" style="width: 68%"></div>
                        </div>
                        <small class="text-warning">5% below target</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="performance-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-bg danger mx-auto">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="metric-value">$892</div>
                        <div class="metric-label">Total Trip Cost</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-danger" style="width: 92%"></div>
                        </div>
                        <small class="text-danger">8% over budget</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Analytics -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="performance-card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Performance Trends</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="performanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="performance-card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-percentage me-2"></i>Efficiency Score</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="progress-circle">
                            <svg width="120" height="120">
                                <circle class="progress-ring" cx="60" cy="60" r="50"></circle>
                                <circle class="progress-value" cx="60" cy="60" r="50" 
                                        stroke-dasharray="0 314" id="efficiencyCircle"></circle>
                            </svg>
                            <div class="progress-text" id="efficiencyScore">87%</div>
                        </div>
                        <h6 class="mt-3 text-success">Excellent Performance</h6>
                        <p class="text-muted small">Based on fuel efficiency, route optimization, and time management</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trip History and Route Analysis -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="performance-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Trips</h5>
                        <button class="btn btn-light btn-sm">View All</button>
                    </div>
                    <div class="card-body">
                        <div class="trip-item p-3" data-trip="1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">New York → Boston</h6>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-route me-1"></i>347 km • 
                                        <i class="fas fa-clock me-1"></i>4h 23m • 
                                        <i class="fas fa-gas-pump me-1"></i>6.8 L/100km
                                    </p>
                                    <small class="text-muted">Yesterday, 09:15 AM</small>
                                </div>
                                <span class="status-badge bg-success text-white">Completed</span>
                            </div>
                        </div>
                        <div class="trip-item p-3" data-trip="2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">Boston → Philadelphia</h6>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-route me-1"></i>487 km • 
                                        <i class="fas fa-clock me-1"></i>5h 47m • 
                                        <i class="fas fa-gas-pump me-1"></i>7.5 L/100km
                                    </p>
                                    <small class="text-muted">2 days ago, 07:30 AM</small>
                                </div>
                                <span class="status-badge bg-success text-white">Completed</span>
                            </div>
                        </div>
                        <div class="trip-item p-3" data-trip="3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">Philadelphia → Washington DC</h6>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-route me-1"></i>226 km • 
                                        <i class="fas fa-clock me-1"></i>3h 12m • 
                                        <i class="fas fa-gas-pump me-1"></i>6.2 L/100km
                                    </p>
                                    <small class="text-muted">3 days ago, 02:45 PM</small>
                                </div>
                                <span class="status-badge bg-warning text-dark">Delayed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="performance-card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-map-marked-alt me-2"></i>Route Analysis</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6f28771a-b44a-40cf-9013-8204684b7be3.png" alt="Interactive route map showing trip paths with performance indicators, fuel stops, and traffic data overlaid on a modern GPS interface" class="img-fluid rounded" />
                        </div>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="metric-value" style="font-size: 1.5rem;">23</div>
                                <div class="metric-label">Routes Analyzed</div>
                            </div>
                            <div class="col-4">
                                <div class="metric-value" style="font-size: 1.5rem;">89%</div>
                                <div class="metric-label">Optimal Routes</div>
                            </div>
                            <div class="col-4">
                                <div class="metric-value" style="font-size: 1.5rem;">12min</div>
                                <div class="metric-label">Avg Time Saved</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cost Analysis -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="performance-card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Cost Breakdown</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="chart-container" style="height: 250px;">
                                    <canvas id="costChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cost-item d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                                    <div>
                                        <i class="fas fa-gas-pump text-primary me-2"></i>
                                        <span>Fuel Costs</span>
                                    </div>
                                    <span class="fw-bold">$487 (55%)</span>
                                </div>
                                <div class="cost-item d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                                    <div>
                                        <i class="fas fa-tools text-warning me-2"></i>
                                        <span>Maintenance</span>
                                    </div>
                                    <span class="fw-bold">$234 (26%)</span>
                                </div>
                                <div class="cost-item d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                                    <div>
                                        <i class="fas fa-road text-info me-2"></i>
                                        <span>Tolls & Fees</span>
                                    </div>
                                    <span class="fw-bold">$98 (11%)</span>
                                </div>
                                <div class="cost-item d-flex justify-content-between align-items-center p-3 mb-2 bg-light rounded">
                                    <div>
                                        <i class="fas fa-ellipsis-h text-secondary me-2"></i>
                                        <span>Other</span>
                                    </div>
                                    <span class="fw-bold">$73 (8%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerts and Recommendations -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="performance-card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Insights & Recommendations</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="alert alert-success" role="alert">
                                    <h6 class="alert-heading"><i class="fas fa-check-circle me-2"></i>Great Progress!</h6>
                                    <p class="mb-0">Your fuel efficiency improved by 15% this month. Keep maintaining steady speeds on highways.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-warning" role="alert">
                                    <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Attention Needed</h6>
                                    <p class="mb-0">Route optimization score dropped. Consider using alternative routes during peak hours.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-info" role="alert">
                                    <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Tip</h6>
                                    <p class="mb-0">Schedule maintenance soon. Early service can prevent 20% of unexpected breakdowns.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            updateLastUpdated();
            initializeCharts();
            animateEfficiencyScore();
            addInteractivity();
        });

        function updateLastUpdated() {
            const now = new Date();
            const options = { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric', 
                hour: '2-digit', 
                minute: '2-digit' 
            };
            document.getElementById('lastUpdated').textContent = now.toLocaleDateString('en-US', options);
        }

        function initializeCharts() {
            // Performance Trends Chart
            const ctx1 = document.getElementById('performanceChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Fuel Efficiency',
                        data: [7.8, 7.5, 7.2, 7.0],
                        borderColor: '#27ae60',
                        backgroundColor: 'rgba(39, 174, 96, 0.1)',
                        tension: 0.4
                    }, {
                        label: 'Route Optimization',
                        data: [72, 78, 85, 89],
                        borderColor: '#3498db',
                        backgroundColor: 'rgba(52, 152, 219, 0.1)',
                        tension: 0.4
                    }, {
                        label: 'Cost per KM',
                        data: [0.85, 0.82, 0.78, 0.75],
                        borderColor: '#f39c12',
                        backgroundColor: 'rgba(243, 156, 18, 0.1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Cost Breakdown Chart
            const ctx2 = document.getElementById('costChart').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Fuel', 'Maintenance', 'Tolls & Fees', 'Other'],
                    datasets: [{
                        data: [55, 26, 11, 8],
                        backgroundColor: [
                            '#3498db',
                            '#f39c12',
                            '#17a2b8',
                            '#6c757d'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        function animateEfficiencyScore() {
            const circle = document.getElementById('efficiencyCircle');
            const scoreText = document.getElementById('efficiencyScore');
            const targetScore = 87;
            const circumference = 2 * Math.PI * 50;
            const targetDash = (targetScore / 100) * circumference;

            // Animate the circle
            setTimeout(() => {
                circle.style.strokeDasharray = `${targetDash} ${circumference}`;
            }, 500);

            // Animate the number
            let currentScore = 0;
            const increment = targetScore / 50;
            const timer = setInterval(() => {
                currentScore += increment;
                if (currentScore >= targetScore) {
                    currentScore = targetScore;
                    clearInterval(timer);
                }
                scoreText.textContent = Math.round(currentScore) + '%';
            }, 30);
        }

        function addInteractivity() {
            // Trip item hover effects
            document.querySelectorAll('.trip-item').forEach(item => {
                item.addEventListener('click', function() {
                    const tripId = this.dataset.trip;
                    showTripDetails(tripId);
                });
            });

            // Performance card hover effects
            document.querySelectorAll('.performance-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }

        function applyFilters() {
            const timePeriod = document.getElementById('timePeriod').value;
            const vehicleType = document.getElementById('vehicleType').value;
            const routeType = document.getElementById('routeType').value;

            // Show loading state
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Applying...';
            btn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Reset button
                btn.innerHTML = originalText;
                btn.disabled = false;

                // Show success message
                showNotification('Filters applied successfully!', 'success');
                
                // Simulate data refresh
                refreshData();
            }, 1500);
        }

        function showTripDetails(tripId) {
            // Create modal or detailed view
            const modal = new bootstrap.Modal(document.getElementById('tripModal') || createTripModal());
            modal.show();
        }

        function createTripModal() {
            const modalHTML = `
                <div class="modal fade" id="tripModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Trip Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Route Information</h6>
                                        <p><strong>Origin:</strong> New York, NY</p>
                                        <p><strong>Destination:</strong> Boston, MA</p>
                                        <p><strong>Distance:</strong> 347 km</p>
                                        <p><strong>Duration:</strong> 4h 23m</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Performance Metrics</h6>
                                        <p><strong>Fuel Efficiency:</strong> 6.8 L/100km</p>
                                        <p><strong>Average Speed:</strong> 79 km/h</p>
                                        <p><strong>Fuel Cost:</strong> $45.20</p>
                                        <p><strong>Total Cost:</strong> $67.80</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            return document.getElementById('tripModal');
        }

        function showNotification(message, type) {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            toast.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>${message}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            document.body.appendChild(toast);

            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 3000);
        }

        function refreshData() {
            // Simulate data refresh with loading indicators
            document.querySelectorAll('.metric-value').forEach(element => {
                element.style.opacity = '0.5';
                setTimeout(() => {
                    element.style.opacity = '1';
                }, 800);
            });

            // Update some values to show change
            setTimeout(() => {
                document.querySelector('.metric-value').textContent = '1,289';
                showNotification('Data refreshed successfully!', 'info');
            }, 1000);
        }

        // Auto-refresh data every 5 minutes
        setInterval(() => {
            updateLastUpdated();
            // You could also refresh charts and metrics here
        }, 300000);

        document.querySelectorAll('.menu-item.has-dropdown .dropdown a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); // stops the page from navigating
        e.stopPropagation(); // stops closing dropdown
        console.log("Link clicked:", this.textContent);
    });
});
    </script>
    <script src="../main/script.js"></script>
</body>
</html>

