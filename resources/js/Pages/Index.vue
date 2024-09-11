<template>
  <div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
      <div class="text-center p-6 bg-white rounded-lg shadow-lg max-w-lg">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
          Welcome to Your Invoice System
        </h1>
        <p class="text-lg text-gray-600 mb-6">
          Manage all your invoices with ease and efficiency.
        </p>
        <Link
          :href="route('invoice.index')"
          class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700"
        >
          Go to Invoices
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>