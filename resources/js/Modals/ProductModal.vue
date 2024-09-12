<template>
  <div
    v-if="showProductModal"
    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center"
  >
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
      <h3 class="text-2xl font-bold mb-4 text-gray-800">Select a Product</h3>
      <div class="max-h-96 overflow-y-auto mb-4">
        <ul class="space-y-2">
          <li
            v-for="product in products"
            :key="product.id"
            @click="selectProduct(product)"
            class="p-4 bg-gray-100 hover:bg-gray-200 cursor-pointer rounded-md"
          >
            <div class="flex justify-between items-center">
              <p class="font-medium text-gray-700">{{ product.name }}</p>
              <p class="text-gray-600">{{ product.price }}</p>
            </div>
          </li>
        </ul>
      </div>
      <button
        @click="closeProductModal"
        class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md"
      >
        Close
      </button>
    </div>
  </div>
</template>

  <script setup>
const props = defineProps({
  products: Array,
  showProductModal: Boolean,
});

const emit = defineEmits(["close", "select"]);

const selectProduct = (product) => {
  emit("select", product);
};

const closeProductModal = () => {
  emit("close");
};
</script>

  <style scoped>
/* Add any additional styling here if necessary */
</style>
