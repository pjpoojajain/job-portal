<script setup>
import { usePage } from '@inertiajs/vue3';
import { CIcon } from '@coreui/icons-vue';
import * as icon from '@coreui/icons';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  jobs: Array
});


</script>

<template>
    <AppLayout title="Dashboard">
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">My Posted Jobs</h1>

    <table class="w-full border border-gray-300 rounded-lg">
      <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2 text-left">#</th>
            <th class="border px-4 py-2 text-left">Title</th>
            <th class="border px-4 py-2 text-left">Company</th>
            <th class="border px-4 py-2 text-left">Skill Set</th>
            <th class="border px-4 py-2 text-left">Description</th>
            <th class="border px-4 py-2 text-left">Location</th>
            <th class="border px-4 py-2 text-left">Salary</th>
            <th class="border px-4 py-2 text-left">Experience</th>
            <th class="border px-4 py-2 text-left">Job Type</th>
            <th class="border px-4 py-2 text-left">Total Openings</th>
            <th class="border px-4 py-2 text-left">Posted At</th>
            <th class="border px-4 py-2 text-left">Apply Now</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(job, index) in props.jobs" :key="job.id" class="hover:bg-gray-50">
          <td class="border px-4 py-2">{{ index + 1 }}</td>
          <td class="border px-4 py-2">{{ job.title }}</td>
          <td class="border px-4 py-2">{{ job.company }}</td>
          <td class="border px-4 py-2">{{ job.skill_set }}</td>
          <td class="border px-4 py-2">{{ job.description }}</td>
          <td class="border px-4 py-2">{{ job.location }}</td>
          <td class="border px-4 py-2">{{ job.salary }}</td>
          <td class="border px-4 py-2">{{ job.experience }}</td>
          <td class="border px-4 py-2">{{ job.job_type }}</td>
          <td class="border px-4 py-2">{{ job.total_openings }}</td>
          <td class="border px-4 py-2">{{ new Date(job.created_at).toLocaleDateString() }}</td>
          <td class="border px-4 py-2"> <CIcon :icon="icon.cilPencil" size="xxl"/></td>
        </tr>
        <tr v-if="props.jobs.length === 0">
          <td colspan="4" class="text-center py-4 text-gray-500">
            No jobs posted yet.
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </AppLayout>
</template>