<script setup>
import { ref } from 'vue'
import { router, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  jobs: Object,
  filters: Object
})

const search = ref(props.filters.search || 'No record found')

const submitSearch = () => {
  router.get('/jobseeker/all-jobs', { search: search.value }, { preserveState: true })
}

const viewJob = (id) => {
  router.visit(`/jobseeker/show/${id}`)
}
</script>

<template>
  <AppLayout title="Dashboard">
  <div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Search bar & filter -->
     <div class="max-w-5xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Search Jobs</h1>

    <!-- Search Bar -->
    <div class="flex mb-6">
      <input
        v-model="search"
        type="text"
        placeholder="Search by title, location..."
        class="border rounded-l px-4 py-2 w-full"
      />
      <button
        @click="submitSearch"
        class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700"
      >
        Search
      </button>
    </div>
  </div>
    <!-- Job listing -->
    <div v-if="props.jobs.data.length > 0" class="grid gap-6">
      <div
        v-for="job in props.jobs.data"
        :key="job.id"
        class="bg-white rounded-xl shadow-md p-6 border hover:shadow-lg transition"
      >
        <div class="flex justify-between items-start">
          <div>
            <h2 class="text-xl font-semibold text-gray-900">
              {{ job.title }}
            </h2>
            <p class="text-gray-600">{{ job.company_name }}</p>
            <p class="text-sm text-gray-500">{{ job.location }}</p>
          </div>
          <span class="text-sm text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
            {{ job.job_type }}
          </span>
        </div>

        <p class="mt-4 text-gray-700 line-clamp-2">
          {{ job.description }}
        </p>

        <div class="flex justify-between items-center mt-6">
          <span class="text-gray-500 text-sm">
            Posted {{ new Date(job.created_at).toLocaleDateString() }}
          </span>
          <button
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
            @click="viewJob(job.id)"
          >
            Apply Now
          </button>
        </div>
      </div>
    </div>
    <div v-else class="grid gap-12 text-center">
      <p class="text-lg font-semibold">No jobs found 🔍</p>
      <p class="text-sm">Try adjusting your search or filters.</p>
    </div>
     <!-- Pagination -->
    <div class="mt-4 flex justify-between">
      <button
        v-if="props.jobs.prev_page_url"
        @click="router.get(props.jobs.prev_page_url)"
        class="px-4 py-2 border rounded hover:bg-gray-100"
      >
        Previous
      </button>

      <button
        v-if="props.jobs.next_page_url"
        @click="router.get(props.jobs.next_page_url)"
        class="px-4 py-2 border rounded hover:bg-gray-100"
      >
        Next
      </button>
    </div>
  </div>
  </AppLayout>
</template>