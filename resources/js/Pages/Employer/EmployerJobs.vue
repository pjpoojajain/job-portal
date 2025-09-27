<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-6">My Job Listings</h1>

    <!-- Empty State -->
    <div v-if="jobs.length === 0" class="text-center py-12 bg-gray-50 rounded-lg shadow-sm">
      <p class="text-gray-500 text-lg">You haven’t posted any jobs yet.</p>
      <Link
        :href="route('employer.jobs.index')"
        class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700"
      >
        + Post a New Job
      </Link>
    </div>

    <!-- Job List -->
    <div v-else class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <div
        v-for="job in jobs"
        :key="job.id"
        class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 flex flex-col justify-between"
      >
        <!-- Job Title -->
        <div>
          <h2 class="text-lg font-semibold text-gray-800">{{ job.title }}</h2>
          <p class="text-sm text-gray-500 mt-1">{{ job.company_name }}</p>
          <p class="text-sm text-gray-400 mt-1">
            Posted on: {{ new Date(job.created_at).toLocaleDateString() }}
          </p>

          <!-- Status Badge -->
          <span
            class="mt-2 inline-block px-3 py-1 text-xs rounded-full font-medium"
            :class="job.status === 'active'
              ? 'bg-green-100 text-green-700'
              : 'bg-gray-200 text-gray-600'"
          >
            {{ job.status }}
          </span>
        </div>

        <!-- Actions -->
        <div class="mt-4 flex items-center justify-between">
          <Link
            :href="route('employer.jobs.edit', job.id)"
            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium"
          >
            ✏️ Edit
          </Link>
          <Link
            class="text-blue-600 hover:text-blue-800 text-sm font-medium"
          >
            👥 View Applicants
          </Link>
          <button
            @click="deleteJob(job.id)"
            class="text-red-600 hover:text-red-800 text-sm font-medium"
          >
            🗑 Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { router, Link } from "@inertiajs/vue3";

const props = defineProps({
  jobs: Array,
});

function deleteJob(id) {
  if (confirm("Are you sure you want to delete this job?")) {
    router.delete(route("employer.jobs.destroy", id), {
      onSuccess: () => alert("Job deleted successfully!"),
    });
  }
}
</script>