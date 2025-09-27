<script setup>
 import AppLayout from '@/Layouts/AppLayout.vue';
 import { router, useForm } from '@inertiajs/vue3'

const props = defineProps({
  job: Object
});

const form = useForm({
  cover_letter: ''
});
// Format created_at nicely
const formatDate = (date) => {
  return new Date(date).toLocaleDateString()
}

function apply() {
  form.post(route('jobseeker.apply', props.job.id), {
    preserveScroll: true,
    onSuccess: () => {
    alert("Application sent successfully.");
      form.reset();
    }
  });
}
</script>
<template>
    <AppLayout>
        <div class="max-w-4xl mx-auto py-10 px-6">
        <!-- Job Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">
        {{ job.title }}
        </h1>

        <!-- Company & Location -->
        <div class="flex items-center text-gray-600 mb-6">
        <span class="mr-4 font-medium">{{ job.company_name }}</span>
        <span class="mr-4">📍 {{ job.location }}</span>
        <span class="text-sm text-gray-500">Posted on {{ formatDate(job.created_at) }}</span>
        </div>

        <!-- Job Description -->
        <div class="prose max-w-none text-gray-800 mb-8">
        <p>{{ job.description }}</p>
        </div>

        <!-- Extra Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
        <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Job Type</h3>
            <p>{{ job.type || 'Full-time' }}</p>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Salary</h3>
            <p>{{ job.salary || 'Not disclosed' }}</p>
        </div>
        </div>

        <!-- Apply Button -->
        <div class="mt-6">
        <button
            @click="apply"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
        :disabled="form.processing" >
            Apply Now
        </button>
        </div>
        </div>
    </AppLayout>
</template>
