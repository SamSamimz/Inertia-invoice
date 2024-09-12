<template>
  <div>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-3xl font-bold mb-6 text-gray-800">Create New Invoice</h2>
      <form @submit.prevent="submitInvoice">
        <!-- Client Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
          <div>
            <label
              for="customer_id"
              class="block text-sm font-medium text-gray-700"
              >Customer</label
            >
            <select
              v-model="form.customer_id"
              id="customer_id"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            >
              <option value="">Select Customer</option>
              <option v-for="(name, id) in customers" :key="id" :value="id">
                {{ name }}
              </option>
            </select>
          </div>
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700"
              >Title</label
            >
            <input
              v-model="form.title"
              type="text"
              id="title"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
              placeholder="Invoice Title"
            />
          </div>
        </div>

        <!-- Invoice Code -->
        <div class="mb-6">
          <label for="code" class="block text-sm font-medium text-gray-700"
            >Invoice Code</label
          >
          <input
            v-model="form.code"
            type="text"
            id="code"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            placeholder="Unique Code"
          />
        </div>

        <!-- Description -->
        <div class="mb-6">
          <label
            for="description"
            class="block text-sm font-medium text-gray-700"
            >Description</label
          >
          <textarea
            v-model="form.description"
            id="description"
            rows="4"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            placeholder="Additional details"
          ></textarea>
        </div>

        <!-- Invoice Dates -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
          <div>
            <label for="date" class="block text-sm font-medium text-gray-700"
              >Invoice Date</label
            >
            <input
              v-model="form.date"
              type="date"
              id="date"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            />
          </div>
          <div>
            <label
              for="due_date"
              class="block text-sm font-medium text-gray-700"
              >Due Date</label
            >
            <input
              v-model="form.due_date"
              type="date"
              id="due_date"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            />
          </div>
        </div>

        <!-- Invoice Items -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700"
            >Invoice Items</label
          >
          <div class="space-y-4">
            <div
              v-for="(item, index) in form.items"
              :key="index"
              class="flex items-center space-x-4 bg-gray-50 p-4 rounded-md shadow-sm"
            >
              <input
                v-model="item.description"
                type="text"
                class="flex-1 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Item Description"
              />
              <input
                v-model.number="item.quantity"
                type="number"
                class="w-24 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Qty"
                @input="calculateTotal"
              />
              <input
                v-model.number="item.unit_price"
                type="number"
                class="w-32 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Unit Price"
                @input="calculateTotal"
              />
              <button
                type="button"
                @click="removeItem(index)"
                class="text-red-500 hover:text-red-700"
              >
                <svg
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  ></path>
                </svg>
              </button>
            </div>
            <button
              @click="openProductModal"
              type="button"
              class="mt-4 text-blue-500 hover:text-blue-700"
            >
              + Add Another Item
            </button>
          </div>
        </div>

        <!-- Invoice Total -->
        <div class="mb-6">
          <label for="total" class="block text-sm font-medium text-gray-700"
            >Total Amount</label
          >
          <input
            v-model="form.total"
            type="number"
            id="total"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            placeholder="Total Amount"
            readonly
          />
        </div>

        <!-- Submit Button -->
        <div>
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md shadow-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          >
            Create Invoice
          </button>
        </div>
      </form>
    </div>

    <!-- Product Modal -->
    <ProductModal
      :products="props.products"
      :showProductModal="showProductModal"
      @close="showProductModal = false"
      @select="addItem"
    />
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import ProductModal from "../Modals/ProductModal.vue";

const form = ref({
  customer_id: "",
  title: "",
  code: "",
  description: "",
  total: 0,
  date: "",
  due_date: "",
  items: [], // Array to hold invoice items
});

const products = ref([]); // Array to hold products fetched from API
const showProductModal = ref(false);

const openProductModal = () => {
  showProductModal.value = true;
};

const closeProductModal = () => {
  showProductModal.value = false;
};

const addItem = (product) => {
  form.value.items.push({
    description: product.name,
    quantity: 1,
    unit_price: product.price,
  });
  calculateTotal();
  closeProductModal();
};

const removeItem = (index) => {
  form.value.items.splice(index, 1);
  calculateTotal();
};

const calculateTotal = () => {
  form.value.total = form.value.items.reduce((total, item) => {
    return total + item.quantity * item.unit_price;
  }, 0);
};

const submitInvoice = () => {
  console.log(form.value);
  // Add logic to submit the invoice data
};

const props = defineProps({
  customers: Object,
  products: Array,
});

// Recalculate total whenever items change
watch(() => form.value.items, calculateTotal, { deep: true });
</script>

<style scoped>
/* Add any additional styling here if necessary */
</style>
