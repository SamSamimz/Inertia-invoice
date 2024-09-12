<template>
  <div
    v-if="showProductModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
  >
    <div
      class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-6 overflow-y-auto max-h-full"
    >
      <h2 class="text-xl font-bold mb-4">Select a Product</h2>

      <!-- Search Input -->
      <div class="mb-4">
        <input
          v-model="searchQuery"
          type="text"
          class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:border-blue-500 focus:ring-1 focus:ring-blue-400"
          placeholder="Search for a product..."
        />
      </div>

      <!-- Product Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <thead>
            <tr>
              <th
                class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600"
              >
                Product Name
              </th>
              <th
                class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600"
              >
                Price
              </th>
              <th
                class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600"
              >
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(product, index) in filteredProducts"
              :key="index"
              class="hover:bg-gray-100 cursor-pointer"
            >
              <td class="py-2 px-4 border-b border-gray-200">
                {{ product.name }}
              </td>
              <td class="py-2 px-4 border-b border-gray-200">
                ${{ product.price }}
              </td>
              <td class="py-2 px-4 border-b border-gray-200">
                <button
                  @click="selectProduct(product)"
                  class="text-blue-500 hover:text-blue-700"
                >
                  Select
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Close Button -->
      <div class="mt-6 text-right">
        <button
          @click="closeModal"
          class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700"
        >
          Close
        </button>
      </div>
    </div>
  </div>
</template>

  <script setup>
import { ref, computed } from "vue";

const props = defineProps({
  products: Array,
  showProductModal: Boolean,
});

// Define the emits function
const emit = defineEmits(["select", "close"]);

const searchQuery = ref("");

// Computed property to filter products based on search query
const filteredProducts = computed(() => {
  return props.products.filter((product) =>
    product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

const selectProduct = (product) => {
  // Emit the selected product to the parent component
  emit("select", product);
  emit("close");
};

const closeModal = () => {
  emit("close");
};
</script>

  <style scoped>
/* Ensure the modal doesn't overflow the screen */
.max-h-full {
  max-height: calc(100vh - 2rem); /* Keeps some space around the modal */
}

.overflow-y-auto {
  overflow-y: auto; /* Allows vertical scrolling */
}
</style>
