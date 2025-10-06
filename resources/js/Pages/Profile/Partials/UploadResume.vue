<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import FormSection from '@/Components/FormSection.vue';

// ✅ Create form with Inertia’s useForm
const form = useForm({
  resume: null,
})

const handleFileChange = (e) => {
  form.resume = e.target.files[0]
}

const uploadResume = () => {
  if (!form.resume) {
    alert('⚠️ Please select a file before uploading.')
    return
  }

  form.post(route('jobseeker.uploadResume'), {
    forceFormData: true, // important for file uploads
    onStart: () => console.log('Uploading...'),
    onSuccess: () => {
      alert('✅ Resume uploaded successfully!')
      form.reset()
    },
    onError: (errors) => {
      console.error(errors)
      alert('❌ Upload failed. Please try again.')
    },
  })
}
</script>
<template>
    <FormSection @submitted="uploadResume">
        <template #title>
            Upload Your Resume
        </template>

        <template #description>
            Upload or Update your resume.
        </template>
        <template #form>
        <div class="col-span-6 sm:col-span-4">
            <!-- File Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                Choose Resume (PDF/DOC)
                </label>
                <input
                type="file"
                accept=".pdf,.doc,.docx"
                @change="handleFileChange"
                class="block w-full border border-gray-300 rounded-lg text-sm
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100"
                />
                <p v-if="form.errors.resume" class="text-red-600 text-sm mt-1">
                {{ form.errors.resume }}
                </p>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg
                    hover:bg-indigo-700 disabled:opacity-50"
            >
                {{ form.processing ? 'Uploading...' : 'Upload Resume' }}
            </button>

            <!-- Uploaded Resume Preview (optional) -->
            <div v-if="form.progress" class="mt-4">
            <div class="h-2 w-full bg-gray-200 rounded">
                <div
                class="h-2 bg-indigo-600 rounded"
                :style="{ width: form.progress.percentage + '%' }"
                ></div>
            </div>
            <p class="text-sm mt-2 text-gray-500">
                Uploading... {{ form.progress.percentage }}%
            </p>
            </div>
        </div>
        </template>
    </FormSection>
</template>

