<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
        title: "",
        company:"",
        skill_set:"",
        description: "",
        location: "",
        salary: "",
        experience:"",
        job_type:"",
        total_openings:""

});

function submit() {
  form.post(route('employer.jobs.store'));
}
</script>
<template>
  <AppLayout title="Dashboard">
  <div class="p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Post a Job</h2>
    <form @submit.prevent="submit">
      <div class="mb-3">
        <label class="block">Job Title</label>
        <input v-model="form.title" type="text" class="w-full p-2 border rounded" required />
      </div>

      <div class="mb-3">
        <label class="block">Company</label>
        <input v-model="form.company" type="text" class="w-full p-2 border rounded" required />
      </div>

      <div class="mb-3">
        <label class="block">Skill Set</label>
        <input v-model="form.skill_set" type="text" class="w-full p-2 border rounded" required />
      </div>

      <div class="mb-3">
        <label class="block">Description</label>
        <textarea v-model="form.description" class="w-full p-2 border rounded" required></textarea>
      </div>

      <div class="mb-3">
        <label class="block">Location</label>
        <input v-model="form.location" type="text" class="w-full p-2 border rounded" required />
      </div>

      <div class="mb-3">
        <label class="block">Salary</label>
        <input v-model="form.salary" type="number" class="w-full p-2 border rounded" />
      </div>

      <div class="mb-3">
        <label class="block">Experience</label>
        <input v-model="form.experience" type="number" class="w-full p-2 border rounded" />
      </div>

      <div class="mb-3">
        <label class="block">Job Type</label>
        <input v-model="form.job_type" type="text" class="w-full p-2 border rounded" required />
      </div>

      <div class="mb-3">
        <label class="block">total_openings</label>
        <input v-model="form.total_openings" type="number" class="w-full p-2 border rounded" required />
      </div>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Post Job
      </button>
    </form>
  </div>
  </AppLayout>
</template>