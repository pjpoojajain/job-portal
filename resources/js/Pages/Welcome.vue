<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
        <Head title="Job Portal | Find Your Dream Job" />

        <div class="min-h-screen bg-gray-50">
            <!-- Navbar -->
            <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-blue-600">JobPortal</h1>
                <nav v-if="canLogin" class="space-x-6">
                <Link href="/" class="hover:text-blue-600">Home</Link>
                <Link :href="route('index')" class="hover:text-blue-600">Browse Jobs</Link>
                <Link href="/about" class="hover:text-blue-600">About</Link>
                <Link v-if="canLogin" :href="route('login')" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Login
                </Link>
                <Link v-if="canRegister" :href="route('register')" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Register
                </Link>
                </nav>
            </div>
            </header>

            <!-- Hero Section -->
            <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-extrabold mb-4">
                Find Your Dream Job Today
                </h2>
                <p class="text-lg mb-6">
                Explore thousands of job opportunities from top companies worldwide.
                </p>

                <!-- Search Bar -->
                <div class="flex justify-center">
                <input
                    type="text"
                    placeholder="Job title, keywords, or company"
                    class="w-96 p-3 rounded-l-md border-none focus:ring-2 focus:ring-blue-400 text-black"
                />
                <button class="bg-yellow-400 text-black px-6 rounded-r-md hover:bg-yellow-500">
                    Search
                </button>
                </div>
            </div>
            </section>

            <!-- Categories -->
            <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <h3 class="text-2xl font-bold text-center mb-10">Browse by Categories</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white shadow p-6 rounded-lg hover:shadow-lg">
                    <p class="text-lg font-semibold">IT & Software</p>
                    <p class="text-gray-500">1200+ Jobs</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg hover:shadow-lg">
                    <p class="text-lg font-semibold">Marketing</p>
                    <p class="text-gray-500">800+ Jobs</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg hover:shadow-lg">
                    <p class="text-lg font-semibold">Finance</p>
                    <p class="text-gray-500">500+ Jobs</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg hover:shadow-lg">
                    <p class="text-lg font-semibold">Healthcare</p>
                    <p class="text-gray-500">900+ Jobs</p>
                </div>
                </div>
            </div>
            </section>

            <!-- Featured Jobs -->
            <section class="py-16">
            <div class="max-w-7xl mx-auto px-6">
                <h3 class="text-2xl font-bold text-center mb-10">Featured Jobs</h3>
                <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg">
                    <h4 class="text-lg font-semibold">Frontend Developer</h4>
                    <p class="text-gray-600">TechCorp Pvt. Ltd.</p>
                    <p class="mt-2 text-sm text-gray-500">Remote | Full-time</p>
                    <Link href="/jobs/1" class="mt-4 inline-block text-blue-600 font-medium">View Details →</Link>
                </div>
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg">
                    <h4 class="text-lg font-semibold">Digital Marketing Specialist</h4>
                    <p class="text-gray-600">Marketify</p>
                    <p class="mt-2 text-sm text-gray-500">Bangalore | Hybrid</p>
                    <Link href="/jobs/2" class="mt-4 inline-block text-blue-600 font-medium">View Details →</Link>
                </div>
                <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg">
                    <h4 class="text-lg font-semibold">Financial Analyst</h4>
                    <p class="text-gray-600">FinancePro</p>
                    <p class="mt-2 text-sm text-gray-500">Delhi | On-site</p>
                    <Link href="/jobs/3" class="mt-4 inline-block text-blue-600 font-medium">View Details →</Link>
                </div>
                </div>
            </div>
            </section>

            <!-- Call to Action -->
            <section class="bg-blue-600 py-12 text-center text-white">
            <h3 class="text-2xl font-bold mb-4">Are you an Employer?</h3>
            <p class="mb-6">Post your job openings and connect with the right talent today.</p>
            <Link
                href="/employer/dashboard"
                class="px-6 py-3 bg-yellow-400 text-black rounded-md hover:bg-yellow-500"
            >
                Post a Job
            </Link>
            </section>

            <!-- Footer -->
            <footer class="bg-gray-900 text-gray-400 py-8">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p>© 2025 JobPortal. All rights reserved.</p>
            </div>
            </footer>
        </div>
</template>
