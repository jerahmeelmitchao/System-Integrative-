@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <div class=" sidebar w-1/4 bg-blue-800 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
        <ul>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-chart-line mr-2"></i>
                    Sales Reports
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-users mr-2"></i>
                    User Management
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-cogs mr-2"></i>
                    Settings
                </a>
            </li>

            <li class="mb-4 hover:bg-gray-700">
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
                <a href="route('logout') " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-white transition-colors hover:bg-gray-700">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>
            </li>
            
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Bar Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="barChart"></canvas>
            </div>
            <!-- Line Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="lineChart"></canvas>
            </div>
            <!-- Pie Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="pieChart"></canvas>
            </div>
            <!-- Doughnut Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="doughnutChart"></canvas>
            </div>
            <!-- Radar Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="radarChart"></canvas>
            </div>
            <!-- Polar Area Chart -->
            <div class="bg-white shadow rounded-lg p-4">
                <canvas id="polarAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales ($)',
                    data: [1200, 1900, 3000, 500, 2000, 3000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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

        // Line Chart
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Website Visitors',
                    data: [150, 200, 180, 220, 190, 300],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        });

        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Direct', 'Referral', 'Social Media'],
                datasets: [{
                    label: 'Traffic Sources',
                    data: [300, 50, 100],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            }
        });

        // Doughnut Chart
        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        const doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Fashion', 'Home & Garden'],
                datasets: [{
                    label: 'Product Categories',
                    data: [200, 300, 400],
                    backgroundColor: ['rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                    borderColor: ['rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                    borderWidth: 1
                }]
            }
        });

        // Radar Chart
        const ctxRadar = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: ['Sales', 'Marketing', 'Development', 'Customer Support'],
                datasets: [{
                    label: 'Performance',
                    data: [65, 59, 90, 81],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Polar Area Chart
        const ctxPolarArea = document.getElementById('polarAreaChart').getContext('2d');
        const polarAreaChart = new Chart(ctxPolarArea, {
            type: 'polarArea',
            data: {
                labels: ['Facebook', 'Twitter', 'LinkedIn', 'Instagram'],
                datasets: [{
                    label: 'Social Media Engagement',
                    data: [300, 50, 100, 200],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 206, 86, 0.2)']
                }]
            }
        });
    });
</script>
@endsection
