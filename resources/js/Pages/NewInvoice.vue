<template>
  <div>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-3xl font-bold mb-6 text-gray-800">Create New Invoice</h2>
      <form @submit.prevent="submitInvoice">
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
            <span v-if="form.errors.customer_id" class="text-red-500 text-sm"
              >{{ form.errors.customer_id }}
            </span>
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
            <span v-if="form.errors.title" class="text-red-500 text-sm">{{
              form.errors.title
            }}</span>
          </div>
        </div>

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
          <span v-if="form.errors.description" class="text-red-500 text-sm"
            >{{ form.errors.description }}
          </span>
        </div>

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
            <span v-if="form.errors.date" class="text-red-500 text-sm">{{
              form.errors.date
            }}</span>
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
            <span v-if="form.errors.due_date" class="text-red-500 text-sm">{{
              form.errors.due_date
            }}</span>
          </div>
        </div>

        <!-- Invoice Items -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700"
            >Invoice Items</label
          >
          <div class="space-y-4">
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

            <span v-if="qError" class="text-red-500 text-sm">
              {{ qError }}
            </span>
          </div>
        </div>

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

        <div class="flex items-center mb-4">
          <input
            v-model="form.paid"
            id="default-checkbox"
            type="checkbox"
            value=""
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
          />
          <label
            for="default-checkbox"
            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >Paid</label
          >
        </div>

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

    <ProductModal
      :products="props.products"
      :showProductModal="showProductModal"
      @close="showProductModal = false"
      @select="addItem"
    />
  </div>
</template>

<script setup>
import { computed, ref, watch } from "vue";
import ProductModal from "../Modals/ProductModal.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  customer_id: "",
  title: "",
  description: "",
  total: 0,
  date: "",
  due_date: "",
  paid: false,
  items: [],
});

const products = ref([]);
const showProductModal = ref(false);

const openProductModal = () => {
  showProductModal.value = true;
};

const closeProductModal = () => {
  showProductModal.value = false;
};

const addItem = (product) => {
  form.items.push({
    product_id: product.id,
    description: product.name,
    quantity: 1,
    unit_price: product.price,
  });
  calculateTotal();
  closeProductModal();
};

const removeItem = (index) => {
  form.items.splice(index, 1);
  calculateTotal();
};

const calculateTotal = () => {
  form.total = form.items.reduce((total, item) => {
    return total + item.quantity * item.unit_price;
  }, 0);
};

const qError = computed(() => {
  if (form.items.length > 0) {
    return null;
  } else {
    return "Please add at least one item";
  }
});
const submitInvoice = () => {
  if (qError.value) {
    return;
  }
  if (
    form.items.some(
      (item) => item.quantity <= 0 || item.quantity > 10 || item.unit_price <= 0
    )
  ) {
    alert("Please check the item quantity and unit price");
    return;
  }
  form.post(route("invoice.new"), {
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      console.log("Error", form.errors);
    },
  });
};

const props = defineProps({
  customers: Object,
  products: Array,
});

watch(() => form.items, calculateTotal, { deep: true });
</script>
