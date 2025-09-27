<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <AppLayout title="Dashboard">
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Jobseeker Dashboard</h1>
    <p class="mb-6">Welcome {{ $page.props.auth.user.name }} 👋</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">🔍 Browse Jobs</h2>
        <Link :href="route('jobseeker.index')" class="text-blue-600 hover:underline">Find Opportunities</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">📑 My Applications</h2>
        <Link href="/applications" class="text-blue-600 hover:underline">Track Status</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">⭐ Saved Jobs</h2>
        <Link href="/saved-jobs" class="text-blue-600 hover:underline">View Saved Jobs</Link>
      </div>
    </div>
  </div>       
    </AppLayout>
</template>
