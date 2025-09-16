<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                     <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <p class="mb-6">Welcome {{ $page.props.auth.user.name }} 👋</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">👥 Manage Users</h2>
        <Link href="/admin/users" class="text-blue-600 hover:underline">View & Edit Users</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">💼 Manage Jobs</h2>
        <Link href="/admin/jobs" class="text-blue-600 hover:underline">View All Jobs</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">🔐 Roles & Permissions</h2>
        <Link href="/admin/roles" class="text-blue-600 hover:underline">Configure Access</Link>
      </div>

      <div class="p-4 border rounded shadow">
        <h2 class="font-semibold mb-2">📊 Reports</h2>
        <Link href="/admin/reports" class="text-blue-600 hover:underline">View Analytics</Link>
      </div>
    </div>
  </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
