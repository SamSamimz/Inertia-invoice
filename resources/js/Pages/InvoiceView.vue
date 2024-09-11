<template>
  <div>
    <!--  -->

    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
        Invoices
      </h1>

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
                Date
              </th>
              <th
                class="py-3 px-4 text-right text-xs font-medium uppercase tracking-wider"
              >
                Total
              </th>
              <th
                class="py-3 px-4 text-right text-xs font-medium uppercase tracking-wider"
              >
                Currency
              </th>
              <th
                class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"
              >
                Payable Due Date
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
          <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
            <tr>
              <td class="py-3 px-4">INV-1001</td>
              <td class="py-3 px-4">Website Design</td>
              <td class="py-3 px-4">2024-09-01</td>
              <td class="py-3 px-4 text-right">$500.00</td>
              <td class="py-3 px-4 text-right">USD</td>
              <td class="py-3 px-4">2024-09-30</td>
              <td class="py-3 px-4">Paid</td>
              <td class="py-3 px-4 text-center flex justify-center space-x-2">
                <button class="text-green-500 hover:text-green-700">
                  <EyeIcon class="w-6 h-6" />
                </button>
                <button class="text-blue-500 hover:text-blue-700">
                  <PrinterIcon class="w-6 h-6" />
                </button>
                <button class="text-red-500 hover:text-red-700">
                  <TrashIcon class="w-6 h-6" />
                </button>
              </td>
            </tr>
            <!-- Repeat rows for other invoices -->
          </tbody>
        </table>
      </div>
    </div>

    <!--  -->
  </div>
</template>

<script setup>
import { TrashIcon, EyeIcon, PrinterIcon } from "@heroicons/vue/24/outline";
</script>
