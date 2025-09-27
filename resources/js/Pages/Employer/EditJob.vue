<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  job: Object,
})

const form = useForm({
  title: props.job.title,
  description: props.job.description,
  location: props.job.location,
  salary: props.job.salary,
})

const submit = () => {
  form.put(route('employer.jobs.update', props.job.id), {
    preserveScroll: true,
    onSuccess: () => {
      alert('✅ Job updated successfully!')
    },
    onError: () => {
      alert('⚠️ Please fix the errors and try again.')
    }
  })
}
</script>

<template>
  <Head title="Edit Job" />

  <div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">✏️ Edit Job</h1>

    <form @submit.prevent="submit" class="bg-white shadow-lg rounded-lg p-8 space-y-6">
      
      <!-- Job Title -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Job Title</label>
        <input
          type="text"
          v-model="form.title"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="e.g., Frontend Developer"
        />
        <p v-if="form.errors.title" class="text-red-500 text-sm mt-1">{{ form.errors.title }}</p>
      </div>

      <!-- Job Description -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Description</label>
        <textarea
          v-model="form.description"
          rows="5"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="Describe the responsibilities and requirements..."
        ></textarea>
        <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
      </div>

      <!-- Location -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Location</label>
        <input
          type="text"
          v-model="form.location"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="e.g., Remote, New York, Bangalore"
        />
        <p v-if="form.errors.location" class="text-red-500 text-sm mt-1">{{ form.errors.location }}</p>
      </div>

      <!-- Salary -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Salary</label>
        <input
          type="text"
          v-model="form.salary"
          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
          placeholder="e.g., ₹50,000/month"
        />
        <p v-if="form.errors.salary" class="text-red-500 text-sm mt-1">{{ form.errors.salary }}</p>
      </div>

      <!-- Buttons -->
      <div class="flex justify-between items-center">
        <Link
          :href="route('employer.jobs.index')"
          class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100"
        >
          Cancel
        </Link>

        <button
          type="submit"
          class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Saving...' : 'Save Changes' }}
        </button>
      </div>
    </form>
  </div>
</template>