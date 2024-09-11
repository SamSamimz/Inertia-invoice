<template>
  <div>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-3xl font-bold mb-6 text-gray-800">Create New Invoice</h2>
      <form>
        <!-- Client Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
          <div>
            <label
              for="customer_id"
              class="block text-sm font-medium text-gray-700"
              >Customer</label
            >
            <select
              id="customer_id"
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
            >
              <!-- Add options dynamically -->
              <option value="">Select Customer</option>
              <!-- Example options -->
              <option value="1">Customer 1</option>
              <option value="2">Customer 2</option>
            </select>
          </div>
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700"
              >Title</label
            >
            <input
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
            <!-- Example item -->
            <div
              class="flex items-center space-x-4 bg-gray-50 p-4 rounded-md shadow-sm"
            >
              <input
                type="text"
                class="flex-1 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Item Description"
              />
              <input
                type="number"
                class="w-24 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Qty"
              />
              <input
                type="number"
                class="w-32 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-400 sm:text-base py-3 px-4 focus:outline-none"
                placeholder="Unit Price"
              />
              <button type="button" class="text-red-500 hover:text-red-700">
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
          </div>
          <button type="button" class="mt-4 text-blue-500 hover:text-blue-700">
            + Add Another Item
          </button>
        </div>

        <!-- Invoice Total -->
        <div class="mb-6">
          <label for="total" class="block text-sm font-medium text-gray-700"
            >Total Amount</label
          >
          <input
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
  </div>
</template>

<script setup></script>
