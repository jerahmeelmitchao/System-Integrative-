@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <div class="sidebar w-1/4 bg-blue-800 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">User Panel</h2>
        <ul>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="route('profile.edit')" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-user mr-2"></i>
                    Profile
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-bell mr-2"></i>
                    Notifications
                </a>
            </li>
            <li class="mb-4 hover:bg-gray-700">
                <a href="#" class="flex items-center p-2 transition-colors">
                    <i class="fas fa-cog mr-2"></i>
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
        <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Profile Overview -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold text-gray-800">Profile Overview</h2>
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                <a href="#" class="text-blue-600 hover:underline">Edit Profile</a>
            </div>

            <!-- User Statistics -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold text-gray-800">User Statistics</h2>
                <canvas id="userStatsChart"></canvas>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold text-gray-800">Recent Activities</h2>
                <ul class="list-disc list-inside">
                    <li>Logged in at {{ now()->format('M d, Y h:i A') }}</li>
                    <li>Updated profile information</li>
                    <li>Checked notifications</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // User Statistics Chart
        const ctxUserStats = document.getElementById('userStatsChart').getContext('2d');
        const userStatsChart = new Chart(ctxUserStats, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Activities per Month',
                    data: [10, 20, 15, 25, 30, 18],
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
    });
</script>
@endsection