<template>
  <div>
    <h1>Test Page</h1>
    <form @submit.prevent="testMe">
      <div class="mb">
        <input type="text" v-model="form.name" />
      </div>
      <!-- Display validation error for the 'name' field -->
      <div v-if="form.errors.name" class="text-red-600">
        {{ form.errors.name }}
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
});

const testMe = () => {
  form.post(route("test"), {
    onSuccess: () => {
      console.log("Success");
      // Handle successful submission
    },
    onError: () => {
      console.log("Error", form.errors);
      // Handle errors
    },
  });
};
</script>
