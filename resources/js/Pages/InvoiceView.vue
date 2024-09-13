<template>
  <div>
    <!-- ***  -->

    <div class="container mx-auto py-8">
      <div class="flex align-center justify-between">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">
          Invoices
        </h2>
        <div>
          <Link
            :href="route('invoice.new')"
            class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-slate-700 border border-transparent rounded-lg shadow-sm hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-600 transition duration-150 ease-in-out"
          >
            Create Invoice
          </Link>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Invoice #
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Title
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Customer
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Date
              </th>
              <th
                class="py-3 px-4 text-right text-xs font-medium uppercase tracking-wider"
              >
                Total
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Due Date
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Status
              </th>
              <th
                class="py-3 px-4 text-center text-xs font-medium uppercase tracking-wider"
              >
                Actions
              </th>
            </tr>
          </thead>
          <tbody
            v-if="invoices"
            class="bg-white divide-y divide-gray-200 text-gray-700"
          >
            <tr v-for="invoice in invoices.data" :key="invoice.id">
              <td class="py-3 px-4">{{ invoice.code }}</td>
              <td class="py-3 px-4">{{ invoice.title }}</td>
              <td class="py-3 px-4">{{ invoice.customer.name }}</td>
              <td class="py-3 px-4">{{ invoice.date }}</td>
              <td class="py-3 px-4 text-right font-semibold text-orange-500">
                {{ invoice.total }}
              </td>
              <td class="py-3 px-4">{{ invoice.due_date }}</td>
              <td class="py-3 px-4">
                <span
                  class="inline-flex items-center px-2 py-0.5 text-xs font-medium text-white rounded-full shadow-sm"
                  :class="{
                    'bg-green-500': invoice.paid,
                    'bg-red-500': !invoice.paid,
                  }"
                >
                  {{ invoice.paid ? "Paid" : "Unpaid" }}
                </span>
              </td>
              <td class="py-3 px-4 text-center flex justify-center space-x-2">
                <button class="text-green-500 hover:text-green-700">
                  <EyeIcon class="w-6 h-6" />
                </button>
                <button
                  @click="viewInvoice(invoice.code)"
                  class="text-blue-500 hover:text-blue-700"
                >
                  <PrinterIcon class="w-6 h-6" />
                </button>
                <button
                  @click="deleteInvoice(invoice.id)"
                  class="text-red-500 hover:text-red-700"
                >
                  <TrashIcon class="w-6 h-6" />
                </button>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td class="py-3 px-4 text-center" colspan="8">
                No invoices found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-if="invoices.length">
        <Paginator :links="invoices.links" />
      </div>
    </div>

    <!-- ***  -->
  </div>
</template>

<script setup>
import { TrashIcon, EyeIcon, PrinterIcon } from "@heroicons/vue/24/outline";
import Paginator from "../Pagination/Paginator.vue";
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
  invoices: Object,
});

const deleteInvoice = (id) => {
  if (confirm("Are you sure you want to delete this invoice?")) {
    Inertia.delete(route("invoice.delete", id));
  }
};

const viewInvoice = (code) => {
  Inertia.visit(route("invoice.print", code));
};
</script>
