<template>
  <div>
    <h2>Print the Invoice for me.</h2>
  </div>
</template>

<script setup>
import { onMounted } from "vue";

onMounted(() => {
  window.print();
  window.close();
});
</script>