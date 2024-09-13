<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
    <div
      class="w-full max-w-3xl min-w-2xl p-8 bg-white border border-gray-200 shadow-lg rounded-lg"
    >
      <div class="flex justify-between mb-8">
        <div class="flex-1">
          <h3 class="font-bold text-orange-500 mb-4">
            Invoice: {{ invoice.code }}
          </h3>
          <div>
            <h3 class="font-semibold text-gray-800 mb-2">Bill to</h3>
            <p class="text-gray-600">{{ invoice.customer.name }}</p>
            <p class="text-gray-600 max-w-64">{{ invoice.customer.address }}</p>
            <p class="text-gray-600">{{ invoice.customer.phone }}</p>
          </div>
        </div>

        <div class="flex-1 text-right">
          <p class="text-gray-600">Full-stack Invoice</p>
          <p class="text-gray-600">291 N 4th St, San Jose, CA 95112, USA</p>
          <p class="text-gray-600">
            {{
              new Date().toLocaleDateString("en-GB", {
                day: "2-digit",
                month: "short",
                year: "numeric",
              })
            }}
          </p>
        </div>
      </div>

      <div class="overflow-x-auto mb-8">
        <table
          class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm"
        >
          <thead>
            <tr class="bg-gray-100 text-gray-800 border-b border-gray-300">
              <th class="py-3 px-4 text-left text-xs font-semibold uppercase">
                Item
              </th>
              <th class="py-3 px-4 text-right text-xs font-semibold uppercase">
                Price
              </th>
              <th class="py-3 px-4 text-right text-xs font-semibold uppercase">
                Qty
              </th>
              <th class="py-3 px-4 text-right text-xs font-semibold uppercase">
                Total
              </th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr
              v-for="(item, index) in invoice.items"
              :key="index"
              class="border-b border-gray-300"
            >
              <td class="py-3 px-4">{{ item.product.name }}</td>
              <td class="py-3 px-4 text-right">{{ item.product.price }}</td>
              <td class="py-3 px-4 text-right">{{ item.quantity }}</td>
              <td class="py-3 px-4 text-right">{{ item.unit_price }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex justify-end border-t border-gray-300 pt-4 text-gray-700">
        <div class="text-right">
          <p class="mb-1">Subtotal: {{ invoice.total }}</p>
          <p class="mb-1">Discount: 00</p>
          <p class="font-semibold">Total: {{ invoice.total }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
defineProps({
  invoice: Object,
});
onMounted(() => {
  window.print();
});
</script>