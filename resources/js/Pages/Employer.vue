<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Employer Dashboard</h1>
    <p class="mb-6">Welcome {{ $page.props.auth.user.name }} 👋</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">📌 Post a Job</h2>
        <Link href="/jobs/create" class="text-blue-600 hover:underline">Create New Job</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">📂 Manage Jobs</h2>
        <Link href="/jobs/manage" class="text-blue-600 hover:underline">View & Edit Jobs</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">👥 Applicants</h2>
        <Link href="/applicants" class="text-blue-600 hover:underline">View Applicants</Link>
      </div>
    </div>
  </div>
    </AppLayout>
</template>
  